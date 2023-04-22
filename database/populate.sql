PRAGMA foreign_keys = ON;

--Department Table
INSERT INTO Department VALUES ('Accounting');
INSERT INTO Department VALUES ('Legal');
INSERT INTO Department VALUES ('Human Resources');
INSERT INTO Department VALUES ('Sales');

--Hashtag Table
INSERT INTO Hashtag VALUES ('#LackPermissions');

--Client Table
INSERT INTO Client VALUES ('Andrew Peterson', 'APeterson12', 'peterson_andrew@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Emily Davis', 'EmilyDavis', 'EmilyDavis15@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Adam Green', 'AGreen', 'Agreen@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Jessica Ramirez', 'JessicaRamirez15', 'jessica_ramirez@snapticket.com','7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Daniel Wilson', 'DWilson14', 'DWilson14@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('James Davis', 'JamesDavis', 'james_davis7@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Jessica Murphy', 'JMurphy', 'jessica_murphy@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Michael Brown', 'MBrown1', 'michael_brown24@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Sarah Johnson', 'SarahJohnson7', 'sarah_johnson7@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Christopher Chen', 'CChen', 'christopher_chen2@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Samantha Kim', 'SKim', 'SKim@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Andrew Patel', 'APatel', 'APat@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Mattew Cooper', 'MCooper', 'MCooper12@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Ethan Chen', 'EChen', 'EthanChen1@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Benjamin Collins', 'BenjCollins', 'BCollins@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);
INSERT INTO Client VALUES ('Tyer Williams', 'TWilliams', 'TWilliams@snapticket.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL);

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
INSERT INTO Ticket VALUES (600, 'Need access to financial reports', '2023-05-13', '', 'JamesDavis', 'Assigned', 'APeterson12');
INSERT INTO Ticket VALUES (599, 'Unable to access customer database', '2023-05-13', '', 'MCooper', 'Assigned', 'EmilyDavis');
INSERT INTO Ticket VALUES (598, 'Incorrect tax filling submitted to IRS for client', '2023-05-12', '', 'MBrown1', 'Assigned', 'APeterson12');
INSERT INTO Ticket VALUES (597, 'Intellectual property dispute', '2023-05-11', '', NULL, 'Open', 'EChen');
INSERT INTO Ticket VALUES (596, 'Privacy policy update to comply with new GDPR legislation', '2023-05-10', '', 'EChen', 'Assigned', 'AGreen');
INSERT INTO Ticket VALUES (595, 'Promotion code not working', '2023-05-10', '', NULL, 'Open', 'JessicaRamirez15');
INSERT INTO Ticket VALUES (594, 'Challenges scheduling sales team training request', '2023-05-09', '', 'BenjCollins', 'Assigned', 'SarahJohnson7');
INSERT INTO Ticket VALUES (593, 'Unable to reconcile bank accounts in QuickBooks', '2023-05-02', '', 'SKim', 'Assigned', 'APeterson12');
INSERT INTO Ticket VALUES (592, 'Having trouble connecting to the companys email', '2023-05-04', '', 'TWilliams', 'Assigned', 'JessicaRamirez15');
INSERT INTO Ticket VALUES (591, 'Complying with EU Laws on Disability Accommodations', '2023-05-04', '', 'SarahJohnson7', 'Assigned', 'DWilson14');
INSERT INTO Ticket VALUES (590, 'Issue with depreciation calculation for fixed assets', '2023-05-11', '', 'SarahJohnson7', 'Assigned', 'APeterson12');
INSERT INTO Ticket VALUES (589, 'Issue with accounts payable aging report', '2023-05-04', '', NULL, 'Open', 'APeterson12');
INSERT INTO Ticket VALUES (588, 'Inquiry about accounting treatment for leasehold improvements', '2023-05-03', '', 'CChen', 'Closed', 'APeterson12');
INSERT INTO Ticket VALUES (587, 'Issue with expense reimbursement for employee travel', '2023-05-03', '', NULL, 'Open', 'APeterson12');
INSERT INTO Ticket VALUES (586, 'Request for assistance with financial due diligence', '2023-05-03', '', 'JamesDavis', 'Closed', 'APeterson12');
INSERT INTO Ticket VALUES (585, 'Having trouble connecting to the company email', '2023-05-02', '', 'APatel', 'Assigned', 'APeterson12');
INSERT INTO Ticket VALUES (584, 'Issue with payroll processing', '2023-05-01', '', 'CChen', 'Assigned', 'APeterson12');

--DepartmentTicket Table
INSERT INTO DepartmentTicket VALUES ('Accounting', 600);
INSERT INTO DepartmentTicket VALUES ('Accounting', 598);
INSERT INTO DepartmentTicket VALUES ('Accounting', 593);
INSERT INTO DepartmentTicket VALUES ('Accounting', 590);
INSERT INTO DepartmentTicket VALUES ('Accounting', 589);
INSERT INTO DepartmentTicket VALUES ('Accounting', 588);
INSERT INTO DepartmentTicket VALUES ('Accounting', 587);
INSERT INTO DepartmentTicket VALUES ('Accounting', 586);
INSERT INTO DepartmentTicket VALUES ('Accounting', 585);
INSERT INTO DepartmentTicket VALUES ('Accounting', 584);

INSERT INTO DepartmentTicket VALUES ('Sales', 599);
INSERT INTO DepartmentTicket VALUES ('Sales', 595);
INSERT INTO DepartmentTicket VALUES ('Sales', 592);

INSERT INTO DepartmentTicket VALUES ('Legal', 597);
INSERT INTO DepartmentTicket VALUES ('Legal', 596);

INSERT INTO DepartmentTicket VALUES ('Human Resources', 594);
INSERT INTO DepartmentTicket VALUES ('Human Resources', 591);

--TicketHashtag Table
INSERT INTO TicketHashtag VALUES (600, '#LackPermissions');

--Comment Table
INSERT INTO Comment VALUES (1, 1, '2023-05-13', 'Im unable to access our financial reports on QuickBooks. Im receiving an error message that says Access denied. You do not have the necessary permissions to access this report. Ive tried logging out and logging back in, but the issue persists. Can anyone grant me acess?', 'APeterson12', 600);
INSERT INTO Comment VALUES (2, 2, '2023-05-14', 'Hi Andrew, Ive updated your user permissions, and you should now be able to access the financial reports. Please let me know if you have any further issues.', 'JamesDavis', 600);
INSERT INTO Comment VALUES (3, 3, '2023-05-14', 'Thanks, everything looks good now. Im able to access the financial reports without any issues. I really appreciate your help!', 'APeterson12', 600);
INSERT INTO Comment VALUES (4, 4, '2023-05-14', 'Youre welcome, Andrew. Glad I could help. Dont hesitate to reach out if you have any further issues.', 'JamesDavis', 600);

--FAQ Table
INSERT INTO FAQ VALUES (1, 'Accounting');

--Question Table
INSERT INTO Question VALUES (1, 1, 'What is the process for managing subscription billing and revenue in our company?','', 1);
INSERT INTO Question VALUES (2, 2, ' How to comply with tax laws and regulations in foreign countries?','', 1);
