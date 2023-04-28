PRAGMA foreign_keys = off;
PRAGMA encoding="UTF-8";
BEGIN TRANSACTION;

DROP TABLE IF EXISTS Department;
CREATE TABLE Department (
    name TEXT PRIMARY KEY
);

DROP TABLE IF EXISTS Hashtag;
CREATE TABLE Hashtag (
    name TEXT PRIMARY KEY
);

DROP TABLE IF EXISTS Client;
CREATE TABLE Client (
    name TEXT NOT NULL, 
    username TEXT PRIMARY KEY, 
    email TEXT, 
    password TEXT,
    user_image BLOB
);

DROP TABLE IF EXISTS Notification;
CREATE TABLE Notification (
    notification_id INTEGER PRIMARY KEY, 
    date TEXT, 
    content TEXT, 
    recipient REFERENCES Client(username) ON DELETE CASCADE ON UPDATE CASCADE,
    sender REFERENCES Client(username) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Agent;
CREATE TABLE Agent (
    username TEXT PRIMARY KEY REFERENCES Client(username) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Admin;
CREATE TABLE Admin (
    username TEXT PRIMARY KEY  REFERENCES Agent(username) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Ticket;
CREATE TABLE Ticket (
    ticket_id INTEGER PRIMARY KEY, 
    ticket_name TEXT,
    date TEXT, 
    priority TEXT, 
    assignee TEXT REFERENCES Agent(username) ON DELETE SET NULL ON UPDATE CASCADE, 
    status TEXT, 
    username REFERENCES Client(username) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS DepartmentTicket;
CREATE TABLE DepartmentTicket (
    name_department REFERENCES Department (name) ON DELETE CASCADE ON UPDATE CASCADE,
    ticket_id INTEGER REFERENCES Ticket (ticket_id) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS TicketHashtag;
CREATE TABLE TicketHashtag (
    ticket_id INTEGER REFERENCES Ticket (ticket_id) ON DELETE CASCADE ON UPDATE CASCADE, 
    name REFERENCES Hashtag (name)
);

DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment (
    comment_id INTEGER PRIMARY KEY,
    num INTEGER, 
    date TEXT, 
    content TEXT, 
    username REFERENCES Client(username) ON DELETE SET NULL ON UPDATE CASCADE NOT NULL, 
    ticket_id INTEGER REFERENCES Ticket(ticket_id) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL
);

DROP TABLE IF EXISTS FAQ;
CREATE TABLE FAQ (
    faq_id INTEGER PRIMARY KEY, 
    name_department REFERENCES Department (name) ON DELETE CASCADE ON UPDATE CASCADE UNIQUE NOT NULL
);


DROP TABLE IF EXISTS Question;
CREATE TABLE Question (
    quest_id INTEGER PRIMARY KEY, 
    num INTEGER, 
    title TEXT, 
    content TEXT,
    faq_id INTEGER REFERENCES FAQ (faq_id) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS AgentQuestion;
CREATE TABLE AgentQuestion (
    username REFERENCES Agent (username) ON DELETE SET NULL ON UPDATE CASCADE,
    quest_id INTEGER REFERENCES Question (quest_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TRIGGER new_assignee_notification AFTER UPDATE OF assignee ON Ticket
BEGIN
    INSERT INTO Notification (date, content, recipient, sender)
    SELECT datetime('now'), 'Ticket ' || NEW.ticket_id || ' has been assigned to ' || NEW.assignee, 
           (SELECT username FROM Client WHERE username = OLD.username),
           (SELECT assignee FROM Ticket WHERE ticket_id = NEW.ticket_id)
    FROM Ticket
    WHERE ticket_id = NEW.ticket_id;

    INSERT INTO Notification (date, content, recipient, sender)
    SELECT datetime('now'), 'You have been assigned to ticket ' || NEW.ticket_id, 
           (SELECT assignee FROM Ticket WHERE ticket_id = NEW.ticket_id),
           (SELECT username FROM Client WHERE username = OLD.username)
    FROM Ticket
    WHERE ticket_id = NEW.ticket_id;
END;

CREATE TRIGGER new_status_notification AFTER UPDATE OF status ON Ticket
BEGIN
    INSERT INTO Notification (date, content, recipient, sender)
    SELECT datetime('now'), 'Ticket ' || NEW.ticket_id || ' has the new status ' || NEW.status, 
           (SELECT username FROM Client WHERE username = OLD.username),
           (SELECT assignee FROM Ticket WHERE ticket_id = NEW.ticket_id)
    FROM Ticket
    WHERE ticket_id = NEW.ticket_id;

    INSERT INTO Notification (date, content, recipient, sender)
    SELECT datetime('now'), 'Ticket ' || NEW.ticket_id || ' has the new status ' || NEW.status, 
           (SELECT assignee FROM Ticket WHERE ticket_id = NEW.ticket_id),
           (SELECT username FROM Client WHERE username = OLD.username)
    FROM Ticket
    WHERE ticket_id = NEW.ticket_id;
END;

CREATE TRIGGER new_comment_notification AFTER INSERT ON Comment
BEGIN
    INSERT INTO Notification (date, content, recipient, sender)
    SELECT datetime('now'), 'Ticket ' || NEW.ticket_id || ' - ' || NEW.username || ' has commented "' || NEW.content || '" in your ticket', 
           username,
           NEW.username
    FROM Ticket
    WHERE ticket_id = NEW.ticket_id
      AND username != NEW.username;
END;


COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
