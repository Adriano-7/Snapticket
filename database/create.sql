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
    password TEXT
);

DROP TABLE IF EXISTS Agent;
CREATE TABLE Agent (
    username REFERENCES Client (username) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Admin;
CREATE TABLE Admin (
    username TEXT REFERENCES Agent (username) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Ticket;
CREATE TABLE Ticket (
    ticket_id INTEGER PRIMARY KEY, 
    ticket_name TEXT,
    date TEXT, 
    priority TEXT, 
    assignee REFERENCES Agent (username) ON DELETE SET NULL ON UPDATE CASCADE, 
    status TEXT, 
    username REFERENCES Client (username) ON DELETE CASCADE ON UPDATE CASCADE
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
    username REFERENCES Client (name) ON DELETE SET NULL ON UPDATE CASCADE NOT NULL, 
    ticket_id INTEGER REFERENCES Ticket (ticket_id) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL
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

DROP TABLE IF EXISTS FAQ;
CREATE TABLE FAQ (
    faq_id INTEGER PRIMARY KEY, 
    name_department REFERENCES Department (name) ON DELETE CASCADE ON UPDATE CASCADE UNIQUE NOT NULL
);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
