PRAGMA foreign_keys = ON;

--Department Table
INSERT INTO Department VALUES ('Accounting');
INSERT INTO Department VALUES ('Law');
INSERT INTO Department VALUES ('Human Resources');
INSERT INTO Department VALUES ('Sales');

--Hashtag Table
INSERT INTO Hashtag VALUES ('#LackPermissions');

--Client Table
INSERT INTO Client VALUES ('Andrew Peterson', 'APeterson12', 'peterson_andrew@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Emily Davis', 'EmilyDavis', 'EmilyDavis15@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Adam Green', 'AGreen', 'Agreen@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Jessica Ramirez', 'JessicaRamirez15', 'jessica_ramirez@snapticket.com','7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Daniel Wilson', 'DWilson14', 'DWilson14@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('James Davis', 'JamesDavis', 'james_davis7@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Jessica Murphy', 'JMurphy', 'jessica_murphy@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Michael Brown', 'MBrown1', 'michael_brown24@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Sarah Johnson', 'SarahJohnson7', 'sarah_johnson7@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Christopher Chen', 'CChen', 'christopher_chen2@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Samantha Kim', 'SKim', 'SKim@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Andrew Patel', 'APatel', 'APat@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Mattew Cooper', 'MCooper', 'MCooper12@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Ethan Chen', 'EChen', 'EthanChen1@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Benjamin Collins', 'BenjCollins', 'BCollins@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO Client VALUES ('Tyer Williams', 'TWilliams', 'TWilliams@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--Agents Table
INSERT INTO Agent VALUES ('JamesDavis');
INSERT INTO Agent VALUES ('JMurphy');
INSERT INTO Agent VALUES ('MBrown1');
INSERT INTO Agent VALUES ('SarahJohnson7');
INSERT INTO Agent VALUES ('CChen');
INSERT INTO Agent VALUES ('SKim');
INSERT INTO Agent VALUES ('APatel');
INSERT INTO Agent VALUES ('MCooper');
INSERT INTO Agent VALUES ('EChen');
INSERT INTO Agent VALUES ('BenjCollins');
INSERT INTO Agent VALUES ('TWilliams');

--Admin Table
INSERT INTO Admin VALUES ('JMurphy');

--Ticket Table
INSERT INTO Ticket VALUES (540, 'Need access to financial reports', '2023-05-13', '', 'SarahJohnson7', 'Assigned', 'APeterson12');
INSERT INTO Ticket VALUES (541, 'Incorrect tax filling submitted to IRS for client', '2023-05-13', '', 'MBrown1', 'Assigned', 'APeterson12');
INSERT INTO Ticket VALUES (542, 'Issue with depreciation calculation for fixed assets', '2023-05-13', '', 'SarahJohnson7', 'Assigned', 'APeterson12');
INSERT INTO Ticket VALUES (543, 'Issue with accounts payable aging report', '2023-05-13', '', NULL, 'Open', 'APeterson12');
INSERT INTO Ticket VALUES (544, 'Inquiry about accounting treatment for leasehold improvements', '2023-05-13', '', 'CChen', 'Closed', 'APeterson12');
INSERT INTO Ticket VALUES (545, 'Issue with expense reimbursement for employee travel', '2023-05-13', '', NULL, 'Open', 'APeterson12');
INSERT INTO Ticket VALUES (546, 'Request for assistance with financial due diligence', '2023-05-13', '', 'JamesDavis', 'Closed', 'APeterson12');
INSERT INTO Ticket VALUES (547, 'Unable to reconcile bank accounts in QuickBooks', '2023-05-13', '', 'SKim', 'Assigned', 'APeterson12');
INSERT INTO Ticket VALUES (548, 'Having trouble connecting to the company email', '2023-05-13', '', 'APatel', 'Assigned', 'APeterson12');
INSERT INTO Ticket VALUES (549, 'Issue with payroll processing', '2023-05-13', '', 'CChen', 'Assigned', 'APeterson12');

--DepartmentTicket Table
INSERT INTO DepartmentTicket VALUES ('Accounting', 540);
INSERT INTO DepartmentTicket VALUES ('Accounting', 541);
INSERT INTO DepartmentTicket VALUES ('Accounting', 542);
INSERT INTO DepartmentTicket VALUES ('Accounting', 543);
INSERT INTO DepartmentTicket VALUES ('Accounting', 544);
INSERT INTO DepartmentTicket VALUES ('Accounting', 545);
INSERT INTO DepartmentTicket VALUES ('Accounting', 546);
INSERT INTO DepartmentTicket VALUES ('Accounting', 547);
INSERT INTO DepartmentTicket VALUES ('Accounting', 548);
INSERT INTO DepartmentTicket VALUES ('Accounting', 549);

--TicketHashtag Table
INSERT INTO TicketHashtag VALUES (540, '#LackPermissions');

--Comment Table
INSERT INTO Comment VALUES (1, 1, '2023-05-13', 'Im unable to access our financial reports on QuickBooks. Im receiving an error message that says Access denied. You do not have the necessary permissions to access this report. Ive tried logging out and logging back in, but the issue persists. Can anyone grant me acess?', 'APeterson12', 540);
INSERT INTO Comment VALUES (2, 2, '2023-05-14', 'Hi Andrew, Ive updated your user permissions, and you should now be able to access the financial reports. Please let me know if you have any further issues.', 'JamesDavis', 540);
INSERT INTO Comment VALUES (3, 3, '2023-05-14', 'Thanks, everything looks good now. Im able to access the financial reports without any issues. I really appreciate your help!', 'APeterson12', 540);
INSERT INTO Comment VALUES (4, 4, '2023-05-14', 'Youre welcome, Andrew. Glad I could help. Dont hesitate to reach out if you have any further issues.', 'JamesDavis', 540);

--FAQ Table
INSERT INTO FAQ VALUES (1, 'Accounting');

--Question Table
INSERT INTO Question VALUES (1, 1, 'What is the process for managing subscription billing and revenue in our company?','', 1);
INSERT INTO Question VALUES (2, 2, ' How to comply with tax laws and regulations in foreign countries?','', 1);