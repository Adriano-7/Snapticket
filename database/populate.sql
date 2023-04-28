PRAGMA foreign_keys = ON;

--Department Table
INSERT INTO Department VALUES ('Accounting');
INSERT INTO Department VALUES ('Legal');
INSERT INTO Department VALUES ('Human Resources');
INSERT INTO Department VALUES ('Sales');

--Hashtag Table
INSERT INTO Hashtag VALUES ('#LackPermissions');

--Client Table
INSERT INTO Client VALUES ('Andrew Peterson', 'APeterson12', 'peterson_andrew@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Emily Davis', 'EmilyDavis', 'EmilyDavis15@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Adam Green', 'AGreen', 'Agreen@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Jessica Ramirez', 'JessicaRamirez15', 'jessica_ramirez@snapticket.com','22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Daniel Wilson', 'DWilson14', 'DWilson14@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('James Davis', 'JamesDavis', 'james_davis7@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Jessica Murphy', 'JMurphy', 'jessica_murphy@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Michael Brown', 'MBrown1', 'michael_brown24@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Sarah Johnson', 'SarahJohnson7', 'sarah_johnson7@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Christopher Chen', 'CChen', 'christopher_chen2@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Samantha Kim', 'SKim', 'SKim@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Andrew Patel', 'APatel', 'APat@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Mattew Cooper', 'MCooper', 'MCooper12@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Ethan Chen', 'EChen', 'EthanChen1@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Benjamin Collins', 'BenjCollins', 'BCollins@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);
INSERT INTO Client VALUES ('Tyler Williams', 'TWilliams', 'TWilliams@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', NULL);

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
INSERT INTO Ticket VALUES (593, 'Unable to reconcile bank accounts in QuickBooks', '2023-05-02', '', 'SKim', 'Closed', 'APeterson12');
INSERT INTO Ticket VALUES (592, 'Having trouble connecting to the companys email', '2023-05-04', '', 'TWilliams', 'Assigned', 'JessicaRamirez15');
INSERT INTO Ticket VALUES (591, 'Complying with EU Laws on Disability Accommodations', '2023-05-04', '', 'SarahJohnson7', 'Assigned', 'DWilson14');
INSERT INTO Ticket VALUES (590, 'Issue with depreciation calculation for fixed assets', '2023-05-11', '', 'SarahJohnson7', 'Assigned', 'APeterson12');
INSERT INTO Ticket VALUES (589, 'Issue with accounts payable aging report', '2023-05-04', '', NULL, 'Open', 'APeterson12');
INSERT INTO Ticket VALUES (588, 'Inquiry about accounting treatment for leasehold improvements', '2023-05-03', '', 'CChen', 'Closed', 'APeterson12');
INSERT INTO Ticket VALUES (587, 'Issue with expense reimbursement for employee travel', '2023-05-03', '', NULL, 'Open', 'APeterson12');
INSERT INTO Ticket VALUES (586, 'Request for assistance with financial due diligence', '2023-05-03', '', 'JamesDavis', 'Closed', 'APeterson12');
INSERT INTO Ticket VALUES (585, 'Request for clarification on revenue recognition policies for new product lines', '2023-05-02', '', 'APatel', 'Assigned', 'APeterson12');
INSERT INTO Ticket VALUES (584, 'Issue with recording credit card transactions in accounting system', '2023-05-01', '', 'CChen', 'Assigned', 'APeterson12');

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

--FAQ Table
INSERT INTO FAQ VALUES (1, 'Accounting');

--Question Table
INSERT INTO Question VALUES (1, 1, 'What is the process for managing subscription billing and revenue in our company?','', 1);
INSERT INTO Question VALUES (2, 2, ' How to comply with tax laws and regulations in foreign countries?','', 1);

--Comments Table
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (1, 1, '2023-05-02', 'Hello, I am having an issue with recording credit card transactions in our accounting system. When I try to input the transactions, I keep getting an error message. Can you please help me resolve this?', 'APeterson12', 584);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (2, 1, '2023-05-02', 'Hi team, Im having issues reconciling our bank accounts in QuickBooks. The amounts are not matching up, and I cant figure out why. Can someone help me?', 'SKim', 593);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (3, 2, '2023-05-03', 'Hi Andrew, thanks for bringing this to my attention. Can you please provide more details about the error message you are receiving? This will help me better understand the issue and find a solution.', 'CChen', 584);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (4, 1, '2023-05-03', 'Hello, I am looking for some clarification on our revenue recognition policies for our new product lines. Could someone please provide me with more information or direct me to the relevant documentation?', 'APeterson12', 585);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (5, 1, '2023-05-03', 'Hi Team, I need your help with performing financial due diligence for a potential acquisition of Waystar Royco. Can you please let me know your availability this week to discuss further?', 'APeterson12', 586);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (6, 2, '2023-05-03', 'Hi Andrew, I am available tomorrow afternoon. Please let me know what time works for you and I will be sure to make myself available.', 'JamesDavis', 586);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (7, 1, '2023-05-03', 'Hi, I recently submitted an expense report for travel expenses incurred on a business trip, but it was rejected. The reason given was that some of the expenses were not covered by our company policy. However, I believe that these expenses are legitimate and should be reimbursed. Can someone help me with this issue?', 'APeterson12', 587);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (8, 1, '2023-05-03', 'Hi team, I have a question regarding the accounting treatment for leasehold improvements. How should these be classified on our balance sheet? Any guidance would be appreciated.', 'APeterson12', 588);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (9, 2, '2023-05-03', 'Hi Scott, have you checked if all transactions have been recorded correctly in QuickBooks? Sometimes missing or duplicated transactions can cause issues when reconciling accounts.', 'APeterson12', 593);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (10, 3, '2023-05-03', 'Hi Andrew, I did check that, and all transactions have been recorded correctly. The issue persists.', 'SKim', 593);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (11, 1, '2023-05-04', 'Of course, the error message says "Transaction not authorized" when I try to input the credit card transaction. I have checked the credit card information and it seems to be correct.', 'APeterson12', 584);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (12, 2, '2023-05-04', 'Hi Andrew, our revenue recognition policies for new product lines are outlined in our companys accounting manual. I can send you a copy of that manual and also set up a meeting to discuss any questions or concerns you may have.', 'APeterson12', 585);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (13, 3, '2023-05-04', 'Tomorrow at 2pm EST works for me. I will send you a calendar invite with a link to join the call. Thank you for your assistance with this.', 'APeterson12', 586);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (14, 4, '2023-05-04', 'Great, I will add it to my calendar. Looking forward to working with you on this project.', 'JamesDavis', 586);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (15, 2, '2023-05-04', 'Hi Andrew, leasehold improvements should be capitalized and amortized over the life of the lease. Let me know if you have any further questions.', 'CChen', 588);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (16, 1, '2023-05-04', 'I am having trouble running the accounts payable aging report. Whenever I try to generate it, I get an error message saying "Error: Unable to generate report." Can anyone help me with this issue?', 'APeterson12', 589);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (17, 1, '2023-05-04', 'Hello team, I need help ensuring the company is compliant with the EU laws on disability accommodations.', 'DWilson14', 591);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (18, 4, '2023-05-04', 'Scott, can you provide me with the bank statement, so I can take a closer look at the transactions? You can email it to me directly.', 'APeterson12', 593);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (19, 2, '2023-05-05', 'Thanks for the additional information, Andrew. I suspect that the issue may be with the credit card processor. I will reach out to them to see if there are any issues on their end. As soon as i get a response ill get back to you.', 'CChen', 584);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (20, 5, '2023-05-05', 'Thanks for your help with this, James. See you tommorow', 'APeterson12', 586);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (21, 3, '2023-05-05', 'Thanks for the information, Christopher. That clears things up for me.', 'CChen', 588);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (22, 2, '2023-05-05', 'Hi David, of course. To ensure compliance, we need to make sure that our website and other digital assets are accessible to people with disabilities. This means using accessible design and providing alternative text for images, among other things. We also need to make sure that our physical locations are accessible, which may include things like installing ramps or providing sign language interpreters for meetings. Ill send you a detailed checklist of things we need to do to ensure compliance.', 'SarahJohnson7', 591);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (23, 4, '2023-05-05', 'Thanks, Sarah. That sounds good. Ill wait for your checklist and well start working on it as soon as possible.', 'DWilson14', 591);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (24, 1, '2023-05-05', 'Good morning, Im having trouble connecting to the companys email. I keep getting an error message that says "Connection Failed". Can you help me with this issue?', 'JessicaRamirez15', 592);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (25, 5, '2023-05-05', 'Sure, Ill send you the bank statement right away. Thank you!', 'SKim', 593);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (26, 2, '2023-05-06', 'Hi Thomas, sorry to hear that you are having trouble connecting to the companys email. Have you tried restarting your computer or clearing your browser cache?', 'TWilliams', 592);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (27, 3, '2023-05-06', 'Yes, I have tried restarting my computer and clearing my browser cache, but the issue still persists.', 'JessicaRamirez15', 592);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (28, 6, '2023-05-06', 'Hi Scott, I reviewed the bank statement, and it seems that there is a missing transaction in QuickBooks. I have recorded it, and you should be able to reconcile the accounts now. Please let me know if you have any further issues.', 'APeterson12', 593);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (29, 7, '2023-05-06', 'Thank you, Andrew. That fixed the issue, and I was able to reconcile the accounts successfully. I appreciate your help!', 'SKim', 593);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (30, 4, '2023-05-07', 'Can you please provide me with more information about the error message that you are receiving? Are you trying to access your email through a web browser or an email client?', 'TWilliams', 592);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (31, 5, '2023-05-07', 'Im using Microsoft Outlook as my email client, and the error message says "Cannot connect to server. Server is offline or you are not connected to the internet".', 'JessicaRamirez15', 592);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (32, 6, '2023-05-08', 'Thanks for the additional information, Jessica. It could be an issue with the email server. Ill look into this and get back to you as soon as possible.', 'TWilliams', 592);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (33, 1, '2023-05-09', 'I am having some challenges scheduling the sales team training request. It seems that several members of the team have conflicting schedules, making it difficult to find a date and time that works for everyone. Do you have any suggestions for how we can address this?', 'SarahJohnson7', 594);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (34, 2, '2023-05-10', 'Hi Sarah, I understand the challenges you are facing. One approach could be to send out a poll to the team members to find out their availability for the training. There are several free online tools that allow you to do this, such as Doodle or When2Meet. Once you have collected the responses, you can use that information to schedule the training at a time that works for everyone.', 'BenjCollins', 594);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (35, 1, '2023-05-10', 'Hi, I tried using a promotion code during checkout, but it doesnt seem to be working. Could you please help me out?', 'JessicaRamirez15', 595);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (36, 1, '2023-05-10', 'Hi team, just wanted to let you know that we need to update our privacy policy to comply with the new GDPR legislation. This is an important legal requirement and we need to ensure that we are in compliance as soon as possible.', 'AGreen', 596);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (37, 2, '2023-05-10', 'Thanks for the heads up. Ill create a task force for that. Let me get back with more details.', 'EChen', 596);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (38, 1, '2023-05-11', 'Hi, I am having trouble with calculating depreciation for our fixed assets. I have checked the calculations multiple times and they seem to be correct, but the system is not accepting it. Can someone please help me with this?', 'APeterson12', 590);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (39, 1, '2023-05-11', 'Thanks, Benjamin. That sounds like a good idea. I will set up a poll and see if we can find a time that works for everyone.', 'SarahJohnson7', 594);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (40, 2, '2023-05-12', 'Hi Andrew, thank you for bringing this to our attention. We will investigate the issue and get back to you as soon as possible.', 'SarahJohnson7', 590);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (41, 1, '2023-05-12', 'I have discovered that a company has been using our copyrighted material without proper permission. I have tried to contact them directly, but they have refused to stop using our work. I believe that legal action may be necessary. Please advise on the best course of action.', 'EChen', 597);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (42, 1, '2023-05-12', 'I have assigned you to ticket #598 regarding an incorrect tax filing submitted to the IRS for a client. Please let me know if you have any questions or need further information.', 'APeterson12', 598);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (43, 2, '2023-05-12', 'Thanks for assigning the ticket to me. Could you please provide me with the client name and the details of the incorrect filing?', 'MBrown1', 598);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (44, 3, '2023-05-12', 'The client name is John Smith, and the incorrect filing was related to their business tax return. I have uploaded the relevant documents to the ticket for your reference.', 'APeterson12', 598);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (45, 4, '2023-05-13', 'Thank you for the information. I will review the documents and work on resolving the issue. Ill keep you updated on my progress.', 'MBrown1', 598);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (46, 5, '2023-05-13', 'I have reviewed the documents and have identified the issue. I will submit a revised tax filing to the IRS. I will also update the client on the status of the filing. Please let me know if you have any questions or need further information.', 'MBrown1', 598);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (47, 6, '2023-05-13', 'Thanks for your help.', 'APeterson12', 598);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (48, 1, '2023-05-13', 'Im unable to access our financial reports on QuickBooks. Im receiving an error message that says Access denied. You do not have the necessary permissions to access this report. Ive tried logging out and logging back in, but the issue persists. Can anyone grant me acess?', 'APeterson12', 600);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (49, 1, '2023-05-14', 'I noticed that the customer database is down. Is there anything we can do to fix it?', 'EmilyDavis', 599);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (50, 2, '2023-05-14', 'Im looking into the issue and will update you as soon as I have more information.', 'MCooper', 599);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (51, 2, '2023-05-14', 'Hi Andrew, Ive updated your user permissions, and you should now be able to access the financial reports. Please let me know if you have any further issues.', 'JamesDavis', 600);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (52, 3, '2023-05-14', 'Thanks, everything looks good now. Im able to access the financial reports without any issues. I really appreciate your help!', 'APeterson12', 600);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (53, 4, '2023-05-14', 'Youre welcome, Andrew. Glad I could help. Dont hesitate to reach out if you have any further issues.', 'JamesDavis', 600);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (54, 3, '2023-05-15', 'Hi Andrew, we have identified the issue and it should be resolved now. Please try again and let us know if you have any further issues.', 'SarahJohnson7', 590);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (55, 4, '2023-05-15', 'Thanks, I think the issue is solved. I appreciate your prompt response!', 'SarahJohnson7', 590);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (56, 3, '2023-05-15', 'Thanks for the update. Let me know if there is anything I can do to assist.', 'EmilyDavis', 599);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (57, 4, '2023-05-16', 'I was able to resolve the issue with the customer database. It should be accessible now. Please confirm on your end.', 'MCooper', 599);
INSERT INTO Comment (comment_id, num, date, content, username, ticket_id) VALUES (58, 5, '2023-05-16', 'Yes, the customer database is accessible now. Thank you for your help!', 'EmilyDavis', 599);
