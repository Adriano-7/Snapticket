PRAGMA foreign_keys = off;
PRAGMA encoding="UTF-8";
BEGIN TRANSACTION;

DROP TABLE IF EXISTS Department;
CREATE TABLE Department (
    department_id INTEGER PRIMARY KEY,
    name TEXT NOT NULL UNIQUE,
    image_id INTEGER REFERENCES File (file_id) ON DELETE SET NULL ON UPDATE CASCADE 
);

DROP TABLE IF EXISTS Hashtag;
CREATE TABLE Hashtag (
    name TEXT PRIMARY KEY
);

DROP TABLE IF EXISTS Client;
CREATE TABLE Client (
    user_id INTEGER PRIMARY KEY,
    name TEXT NOT NULL, 
    username TEXT UNIQUE NOT NULL, 
    email TEXT, 
    password TEXT,
    image_id INTEGER REFERENCES File (file_id) ON DELETE SET NULL ON UPDATE CASCADE DEFAULT 1
);

DROP TABLE IF EXISTS Notification;
CREATE TABLE Notification (
    notification_id INTEGER PRIMARY KEY, 
    date TEXT DEFAULT (datetime('now', 'localtime')), 
    content TEXT,
    isVisited INTEGER DEFAULT 0, 
    recipient INTEGER REFERENCES Client(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    sender INTEGER REFERENCES Client(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    ticket_id INTEGER REFERENCES Ticket(ticket_id) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Agent;
CREATE TABLE Agent (
    user_id INTEGER PRIMARY KEY REFERENCES Client(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS ClientDepartment;
CREATE TABLE ClientDepartment (
    user_id INTEGER REFERENCES Client(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    department_id REFERENCES Department (department_id) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Admin;
CREATE TABLE Admin (
    user_id INTEGER PRIMARY KEY  REFERENCES Agent(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Ticket;
CREATE TABLE Ticket (
    ticket_id INTEGER PRIMARY KEY, 
    ticket_name TEXT,
    date TEXT DEFAULT (datetime('now', 'localtime')),
    priority TEXT, 
    assignee INTEGER REFERENCES Agent(user_id) ON DELETE SET NULL ON UPDATE CASCADE, 
    status TEXT, 
    creator INTEGER REFERENCES Client(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS DepartmentTicket;
CREATE TABLE TicketDepartment (
    department_id REFERENCES Department (department_id) ON DELETE CASCADE ON UPDATE CASCADE,
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
    date TEXT DEFAULT (datetime('now', 'localtime')), 
    content TEXT, 
    user_id INTEGER REFERENCES Client(user_id) ON DELETE SET NULL ON UPDATE CASCADE NOT NULL, 
    ticket_id INTEGER REFERENCES Ticket(ticket_id) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL
);

DROP TABLE IF EXISTS FAQ;
CREATE TABLE FAQ (
    faq_id INTEGER PRIMARY KEY, 
    department_id REFERENCES Department (department_id) ON DELETE CASCADE ON UPDATE CASCADE UNIQUE
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
    user_id INTEGER REFERENCES Agent (user_id) ON DELETE SET NULL ON UPDATE CASCADE,
    quest_id INTEGER REFERENCES Question (quest_id) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS File;
CREATE TABLE File (
    file_id INTEGER PRIMARY KEY, 
    file_name TEXT, 
    date TEXT DEFAULT (datetime('now', 'localtime')),
    file_type TEXT,
    
    comment_id INTEGER REFERENCES Comment (comment_id) ON DELETE CASCADE ON UPDATE CASCADE DEFAULT NULL,

    content BLOB
);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
