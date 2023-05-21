PRAGMA foreign_keys = ON;

--TicketHistory Table

CREATE TRIGGER new_ticket_history AFTER INSERT ON Ticket
BEGIN
    INSERT INTO TicketHistory (ticket_id, user_id, content)
    SELECT NEW.ticket_id, NEW.creator, 'created the ticket'
    FROM Ticket
    WHERE ticket_id = NEW.ticket_id;
END;

-- Notifications Table
CREATE TRIGGER new_assignee_notification AFTER UPDATE OF assignee ON Ticket
BEGIN
    INSERT INTO Notification (date, content, recipient, sender, ticket_id)
    SELECT strftime(datetime('now')), 'Your ticket "' || (SELECT ticket_name FROM Ticket WHERE ticket_id = NEW.ticket_id) 
            || '"' || ' has been assigned to ' || (SELECT username FROM Client where user_id = NEW.assignee), 

           (SELECT user_id FROM Client WHERE user_id = OLD.creator),
           (SELECT assignee FROM Ticket WHERE ticket_id = NEW.ticket_id),
           NEW.ticket_id
    FROM Ticket
    WHERE ticket_id = NEW.ticket_id;

    INSERT INTO Notification (date, content, recipient, sender, ticket_id)
    SELECT strftime(datetime('now')), 'You have been assigned to ticket "' || 
           (SELECT ticket_name FROM Ticket WHERE ticket_id = NEW.ticket_id) || '"', 
           (SELECT assignee FROM Ticket WHERE ticket_id = NEW.ticket_id),
           (SELECT user_id FROM Client WHERE user_id = OLD.creator),
            NEW.ticket_id
    FROM Ticket
    WHERE ticket_id = NEW.ticket_id;
END;

CREATE TRIGGER assignee_notification AFTER INSERT ON Ticket
BEGIN
    INSERT INTO Notification (date, content, recipient, sender, ticket_id)
    SELECT NEW.date, 'You have been assigned to ticket "' || 
           (SELECT ticket_name FROM Ticket WHERE ticket_id = NEW.ticket_id) || '"', 
           (SELECT assignee FROM Ticket WHERE ticket_id = NEW.ticket_id),
           (SELECT user_id FROM Client WHERE user_id = NEW.creator),
            NEW.ticket_id
    FROM Ticket
    WHERE ticket_id = NEW.ticket_id AND assignee IS NOT NULL;
END;

CREATE TRIGGER new_status_notification AFTER UPDATE OF status ON Ticket
BEGIN
    INSERT INTO Notification (date, content, recipient, sender, ticket_id)
    SELECT datetime('now'), 'Your ticket "' || 
           (SELECT ticket_name FROM Ticket WHERE ticket_id = NEW.ticket_id) || '"' || ' status was changed to ' || NEW.status, 
           (SELECT user_id FROM Client WHERE user_id = OLD.creator),
           (SELECT assignee FROM Ticket WHERE ticket_id = NEW.ticket_id),
            NEW.ticket_id
    FROM Ticket
    WHERE ticket_id = NEW.ticket_id;

    INSERT INTO Notification (date, content, recipient, sender, ticket_id)
    SELECT datetime('now'), 'Your assigned ticket "' || 
           (SELECT ticket_name FROM Ticket WHERE ticket_id = NEW.ticket_id) || '"' || ' status was changed to ' || NEW.status, 
           (SELECT assignee FROM Ticket WHERE ticket_id = NEW.ticket_id),
           (SELECT user_id FROM Client WHERE user_id = OLD.creator),
            NEW.ticket_id
    FROM Ticket
    WHERE ticket_id = NEW.ticket_id;
END;

--Gotta refactor this one
CREATE TRIGGER new_comment_notification AFTER INSERT ON Comment
BEGIN
    INSERT INTO Notification (date, content, recipient, sender, ticket_id)
    SELECT NEW.date, 
    'Responded to your ticket "' || (SELECT ticket_name FROM Ticket WHERE ticket_id = NEW.ticket_id) || '"', 
    (SELECT user_id FROM Client WHERE user_id = (SELECT creator FROM Ticket WHERE ticket_id = NEW.ticket_id)),
    (SELECT user_id FROM Client WHERE user_id = NEW.user_id),
    NEW.ticket_id
    FROM Ticket
    WHERE ticket_id = NEW.ticket_id AND (SELECT creator FROM Ticket WHERE ticket_id = NEW.ticket_id) != NEW.user_id;
END;

CREATE TRIGGER DeleteClientTickets
BEFORE DELETE ON Client
FOR EACH ROW
BEGIN
    DELETE FROM Ticket WHERE creator = OLD.user_id;
END;