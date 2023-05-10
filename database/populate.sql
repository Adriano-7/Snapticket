PRAGMA foreign_keys = ON;

--File Table
INSERT INTO File (file_id, file_name, file_type, content) VALUES (1, 'default.jpg', 'jpg', readfile('../assets/profile_pics_examples/default.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (2, 'APeterson12.jpg', 'jpg', readfile('../assets/profile_pics_examples/APeterson12.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (3, 'EmilyDavis.jpg', 'jpg', readfile('../assets/profile_pics_examples/EmilyDavis.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (4, 'AGreen.jpg', 'jpg', readfile('../assets/profile_pics_examples/AGreen.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (5, 'JessicaRamirez15.jpg', 'jpg', readfile('../assets/profile_pics_examples/JessicaRamirez15.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (6, 'DWilson14.jpg', 'jpg', readfile('../assets/profile_pics_examples/DWilson14.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (7, 'JamesDavis.jpg', 'jpg', readfile('../assets/profile_pics_examples/JamesDavis.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (8, 'JMurphy.jpg', 'jpg', readfile('../assets/profile_pics_examples/JMurphy.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (9, 'MBrown1.jpg','jpg', readfile('../assets/profile_pics_examples/MBrown1.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (10, 'SarahJohnson7.jpg', 'jpg', readfile('../assets/profile_pics_examples/SarahJohnson7.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (11, 'CChen.jpg', 'jpg', readfile('../assets/profile_pics_examples/CChen.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (12, 'SKim.jpg','jpg', readfile('../assets/profile_pics_examples/SKim.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (13, 'APatel.jpg','jpg', readfile('../assets/profile_pics_examples/APatel.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (14, 'MCooper.jpg','jpg', readfile('../assets/profile_pics_examples/MCooper.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (15, 'EChen.jpg','jpg', readfile('../assets/profile_pics_examples/EChen.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (16, 'BenjCollins.jpg','jpg', readfile('../assets/profile_pics_examples/BenjCollins.jpg'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (17, 'TWilliams.jpg','jpg', readfile('../assets/profile_pics_examples/TWilliams.jpg'));

INSERT INTO File (file_id, file_name, file_type, content) VALUES (18, 'accounting.png','png', readfile('../assets/department_icons/accounting.png'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (19, 'human_resources.png','png', readfile('../assets/department_icons/human_resources.png'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (20, 'legal.png','png', readfile('../assets/department_icons/legal.png'));
INSERT INTO File (file_id, file_name, file_type, content) VALUES (21, 'sales.png','png', readfile('../assets/department_icons/sales.png'));


--Department Table
INSERT INTO Department (department_id, name, image_id) VALUES (1, 'Accounting', 18);
INSERT INTO Department (department_id, name, image_id) VALUES (2, 'Legal', 19);
INSERT INTO Department (department_id, name, image_id) VALUES (3, 'Human Resources', 20);
INSERT INTO Department (department_id, name, image_id) VALUES (4, 'Sales', 21);

--Hashtag Table
INSERT INTO Hashtag VALUES ('LackPermissions');

--Client Table
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (1, 'Andrew Peterson', 'APeterson12', 'peterson_andrew@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 2);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (2, 'Emily Davis', 'EmilyDavis', 'EmilyDavis15@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 3);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (3, 'Adam Green', 'AGreen', 'Agreen@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 4);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (4, 'Jessica Ramirez', 'JessicaRamirez15', 'jessica_ramirez@snapticket.com','22255db5e42ee69fcda1019d3cebb95e64b62f76', 5);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (5, 'Daniel Wilson', 'DWilson14', 'DWilson14@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 6);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (6, 'James Davis', 'JamesDavis', 'james_davis7@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 7);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (7, 'Jessica Murphy', 'JMurphy', 'jessica_murphy@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 8);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (8, 'Michael Brown', 'MBrown1', 'michael_brown24@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 9);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (9, 'Sarah Johnson', 'SarahJohnson7', 'sarah_johnson7@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 10);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (10, 'Christopher Chen', 'CChen', 'christopher_chen2@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 11);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (11, 'Samantha Kim', 'SKim', 'SKim@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 12);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (12, 'Andrew Patel', 'APatel', 'APat@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 13);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (13, 'Mattew Cooper', 'MCooper', 'MCooper12@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 14);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (14, 'Ethan Chen', 'EChen', 'EthanChen1@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 15);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (15, 'Benjamin Collins', 'BenjCollins', 'BCollins@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 16);
INSERT INTO Client (user_id, name,username,email,password, image_id) VALUES (16, 'Tyler Williams', 'TWilliams', 'TWilliams@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76', 17);

--Agents Table
INSERT INTO Agent VALUES (16);
INSERT INTO Agent VALUES (6);
INSERT INTO Agent VALUES (7);
INSERT INTO Agent VALUES (8);
INSERT INTO Agent VALUES (9);
INSERT INTO Agent VALUES (10);
INSERT INTO Agent VALUES (11);
INSERT INTO Agent VALUES (12);
INSERT INTO Agent VALUES (13);
INSERT INTO Agent VALUES (14);
INSERT INTO Agent VALUES (15);

--ClientDepartment Table
INSERT INTO ClientDepartment VALUES (6, 1);
INSERT INTO ClientDepartment VALUES (8, 1);
INSERT INTO ClientDepartment VALUES (9, 1);
INSERT INTO ClientDepartment VALUES (10, 1);
INSERT INTO ClientDepartment VALUES (11, 1);
INSERT INTO ClientDepartment VALUES (12, 1);

INSERT INTO ClientDepartment VALUES (13, 4);
INSERT INTO ClientDepartment VALUES (16, 4);

INSERT INTO ClientDepartment VALUES (14, 2);

INSERT INTO ClientDepartment VALUES (9, 3);
INSERT INTO ClientDepartment VALUES (15, 3);

--Admin Table
INSERT INTO Admin VALUES (7);

--Ticket Table
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Issue with recording credit card transactions in accounting system', '2023-05-01 09:30:15', '', 10, 'Assigned', 1);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Request for clarification on revenue recognition policies for new product lines', '2023-05-02 10:30:15', '', 12, 'Assigned', 1);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Request for assistance with financial due diligence', '2023-05-03 19:30:15', '', 6, 'Closed', 1);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Issue with expense reimbursement for employee travel', '2023-05-03 23:30:15', '', NULL, 'Open', 1);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Inquiry about accounting treatment for leasehold improvements', '2023-05-03 23:30:25', '', 10, 'Closed', 1);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Issue with accounts payable aging report', '2023-05-04 09:30:15', '', NULL, 'Open', 1);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Issue with depreciation calculation for fixed assets', '2023-05-04 10:30:15', '', 9, 'Assigned', 1);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Complying with EU Laws on Disability Accommodations', '2023-05-04 14:30:15', '', 9, 'Assigned', 5);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Having trouble connecting to the companys email', '2023-05-04 16:30:15', '', 16, 'Assigned', 4);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Unable to reconcile bank accounts in QuickBooks', '2023-05-05 19:20:15', '', 11, 'Closed', 1);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Challenges scheduling sales team training request', '2023-05-06 09:36:15', '', 15, 'Assigned', 9);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Promotion code not working', '2023-05-11 10:30:15', '', NULL, 'Open', 4);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Privacy policy update to comply with new GDPR legislation', '2023-05-11 12:30:15', '', 14, 'Assigned', 3);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Intellectual property dispute', '2023-05-11 17:30:15', '', NULL, 'Open', 14);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Incorrect tax filling submitted to IRS for client', '2023-05-12 09:30:15', '', 8, 'Assigned', 1);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Unable to access customer database', '2023-05-13 11:30:15', '', 13, 'Assigned', 2);
INSERT INTO Ticket (ticket_name, date, priority, assignee, status, creator) VALUES ('Need access to financial reports', '2023-05-13 12:30:15', '', 6, 'Assigned', 1);

--TicketDepartment Table
INSERT INTO TicketDepartment VALUES (1, 1);
INSERT INTO TicketDepartment VALUES (1, 2);
INSERT INTO TicketDepartment VALUES (1, 3);
INSERT INTO TicketDepartment VALUES (1, 4);
INSERT INTO TicketDepartment VALUES (1, 5);
INSERT INTO TicketDepartment VALUES (1, 6);
INSERT INTO TicketDepartment VALUES (1, 7);
INSERT INTO TicketDepartment VALUES (1, 10);
INSERT INTO TicketDepartment VALUES (1, 15);
INSERT INTO TicketDepartment VALUES (1, 17);

INSERT INTO TicketDepartment VALUES (4, 9);
INSERT INTO TicketDepartment VALUES (4, 12);
INSERT INTO TicketDepartment VALUES (4, 16);

INSERT INTO TicketDepartment VALUES (2, 13);
INSERT INTO TicketDepartment VALUES (2, 14);

INSERT INTO TicketDepartment VALUES (3, 8);
INSERT INTO TicketDepartment VALUES (3, 11);

--TicketHashtag Table
INSERT INTO TicketHashtag VALUES (17, 'LackPermissions');

--FAQ Table
INSERT INTO FAQ (faq_id, department_id) VALUES (1, 1);

--Question Table
INSERT INTO Question (num, title, content, faq_id) VALUES (1, 'What is the process for managing subscription billing and revenue in our company?','', 1);
INSERT INTO Question (num, title, content, faq_id) VALUES (2, ' How to comply with tax laws and regulations in foreign countries?','', 1);

--Comments Table
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-01 09:30:15','Hello, I am having an issue with recording credit card transactions in our accounting system. When I try to input the transactions, I keep getting an error message. Can you please help me resolve this?', 1, 1);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-01 10:25:15','Hi Andrew thanks for bringing this to my attention. Can you please provide more details about the error message you are receiving? This will help me better understand the issue and find a solution.', 10, 1);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-01 11:20:15','Of course, the error message says ""Transaction not authorized"" when I try to input the credit card transaction. I have checked the credit card information and it seems to be correct.', 1, 1);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-01 11:30:15','Thanks for the additional information, Andrew. I suspect that the issue may be with the credit card processor. I will reach out to them to see if there are any issues on their end. As soon as i get a response ill get back to you.', 10, 1);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-02 10:30:15','Hello, I am looking for some clarification on our revenue recognition policies for our new product lines. Could someone please provide me with more information or direct me to the relevant documentation?', 1, 2);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-02 11:22:15','Hi Andrew, our revenue recognition policies for new product lines are outlined in our companys accounting manual. I can send you a copy of that manual and also set up a meeting to discuss any questions or concerns you may have.', 1, 2);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-03 19:30:15','Hi Team, I need your help with performing financial due diligence for a potential acquisition of Waystar Royco. Can you please let me know your availability this week to discuss further?', 1, 3);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-03 23:30:15','Hi, I recently submitted an expense report for travel expenses incurred on a business trip, but it was rejected. The reason given was that some of the expenses were not covered by our company policy. However I believe that these expenses are legitimate and should be reimbursed. Can someone help me with this issue?', 1, 4);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-03 23:30:25','Hi team, I have a question regarding the accounting treatment for leasehold improvements. How should these be classified on our balance sheet? Any guidance would be appreciated.', 1, 5);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-04 09:30:15','I am having trouble running the accounts payable aging report. Whenever I try to generate it, I get an error message saying ""Error: Unable to generate report."" Can anyone help me with this issue?', 1, 6);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-04 10:30:15','Hi Andrew, I am available tomorrow afternoon. Please let me know what time works for you and I will be sure to make myself available.', 6, 3);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-04 10:30:15','Hi, I am having trouble with calculating depreciation for our fixed assets. I have checked the calculations multiple times and they seem to be correct, but the system is not accepting it. Can someone please help me with this?', 1, 7);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-04 11:10:25','Hi Andrew, leasehold improvements should be capitalized and amortized over the life of the lease. Let me know if you have any further questions.', 10, 5);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (3,'2023-05-04 12:32:15','Tomorrow at 2pm EST works for me. I will send you a calendar invite with a link to join the call. Thank you for your assistance with this.', 1, 3);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-04 14:30:15','Hello team, I need help ensuring the company is compliant with the EU laws on disability accommodations.', 5, 8);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (4,'2023-05-04 15:30:15','Great, I will add it to my calendar. Looking forward to working with you on this project.', 6, 3);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-04 16:30:15','Good morning, Im having trouble connecting to the companys email. I keep getting an error message that says ""Connection Failed"". Can you help me with this issue?', 4, 9);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-04 16:35:15','Hi David, of course. To ensure compliance, we need to make sure that our website and other digital assets are accessible to people with disabilities. This means using accessible design and providing alternative text for images among other things. We also need to make sure that our physical locations are accessible, which may include things like installing ramps or providing sign language interpreters for meetings. Ill send you a detailed checklist of things we need to do to ensure compliance.', 9, 8);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (3,'2023-05-04 18:30:15','Thanks, Sarah. That sounds good. Ill wait for your checklist and well start working on it as soon as possible.', 5, 8);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (5,'2023-05-04 19:32:12','Thanks for your help with this, James. See you tommorow', 1, 3);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (3,'2023-05-04 23:30:25','Thanks for the information, Christopher. That clears things up for me.', 10, 5);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-05 10:10:15','Hi Andrew, thank you for bringing this to our attention. We will investigate the issue and get back to you as soon as possible.', 9, 7);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-05 12:30:15','Hi Thomas, sorry to hear that you are having trouble connecting to the companys email. Have you tried restarting your computer or clearing your browser cache?', 16, 9);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (3,'2023-05-05 12:34:15','Yes, I have tried restarting my computer and clearing my browser cache, but the issue still persists.', 4, 9);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (3,'2023-05-05 13:30:15','Hi Andrew, we have identified the issue and it should be resolved now. Please try again and let us know if you have any further issues.', 9, 7);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (4,'2023-05-05 14:37:15','Can you please provide me with more information about the error message that you are receiving? Are you trying to access your email through a web browser or an email client?', 16, 9);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (5,'2023-05-05 16:30:15','Im using Microsoft Outlook as my email client, and the error message says ""Cannot connect to server. Server is offline or you are not connected to the internet"".', 4, 9);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (6,'2023-05-05 18:30:15','Thanks for the additional information, Jessica. It could be an issue with the email server. Ill look into this and get back to you as soon as possible.', 16, 9);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-05 19:20:15','Hi team Im having issues reconciling our bank accounts in QuickBooks. The amounts are not matching up, and I cant figure out why. Can someone help me?', 11, 10);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-06 09:22:15','Hi Scott, have you checked if all transactions have been recorded correctly in QuickBooks? Sometimes missing or duplicated transactions can cause issues when reconciling accounts.', 1, 10);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-06 09:36:15','I am having some challenges scheduling the sales team training request. It seems that several members of the team have conflicting schedules, making it difficult to find a date and time that works for everyone. Do you have any suggestions for how we can address this?', 9, 11);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (3,'2023-05-06 11:20:15','Hi Andrew, I did check that, and all transactions have been recorded correctly. The issue persists.', 11, 10);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-06 11:32:15','Hi Sarah, I understand the challenges you are facing. One approach could be to send out a poll to the team members to find out their availability for the training. There are several free online tools that allow you to do this, such as Doodle or When2Meet. Once you have collected the responses, you can use that information to schedule the training at a time that works for everyone.', 15, 11);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (4,'2023-05-06 11:50:15','Scott, can you provide me with the bank statement, so I can take a closer look at the transactions? You can email it to me directly.', 1, 10);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (5,'2023-05-06 12:20:15','Sure, Ill send you the bank statement right away. Thank you!', 11, 10);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (7,'2023-05-06 14:12:15','Thank you, Andrew. That fixed the issue, and I was able to reconcile the accounts successfully. I appreciate your help!', 11, 10);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (6,'2023-05-06 14:20:15','Hi Scott, I reviewed the bank statement, and it seems that there is a missing transaction in QuickBooks. I have recorded it, and you should be able to reconcile the accounts now. Please let me know if you have any further issues.', 1, 10);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-06 15:36:15','Thanks, Benjamin. That sounds like a good idea. I will set up a poll and see if we can find a time that works for everyone.', 9, 11);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (4,'2023-05-06 9:30:15','Thanks, I think the issue is solved. I appreciate your prompt response!', 9, 7);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-11 10:30:15','Hi, I tried using a promotion code during checkout, but it doesnt seem to be working. Could you please help me out?', 4, 12);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-11 12:30:15','Hi team, just wanted to let you know that we need to update our privacy policy to comply with the new GDPR legislation. This is an important legal requirement and we need to ensure that we are in compliance as soon as possible.', 3, 13);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-11 15:30:15','Thanks for the heads up. Ill create a task force for that. Let me get back with more details.', 14, 13);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-11 17:30:15','I have discovered that a company has been using our copyrighted material without proper permission. I have tried to contact them directly, but they have refused to stop using our work. I believe that legal action may be necessary. Please advise on the best course of action.', 14, 14);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-12 09:30:15','I have assigned you to ticket #15 regarding an incorrect tax filing submitted to the IRS for a client. Please let me know if you have any questions or need further information.', 1, 15);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-12 10:30:15','Thanks for assigning the ticket to me. Could you please provide me with the client name and the details of the incorrect filing?', 8, 15);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (3,'2023-05-12 10:45:15','The client name is John Smith, and the incorrect filing was related to their business tax return. I have uploaded the relevant documents to the ticket for your reference.', 1, 15);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (4,'2023-05-12 11:10:15','Thank you for the information. I will review the documents and work on resolving the issue. Ill keep you updated on my progress.', 8, 15);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (5,'2023-05-12 16:34:15','I have reviewed the documents and have identified the issue. I will submit a revised tax filing to the IRS. I will also update the client on the status of the filing. Please let me know if you have any questions or need further information.', 8, 15);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (6,'2023-05-12 16:39:00','Thanks for your help.', 1, 15);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-13 11:30:15','I noticed that the customer database is down. Is there anything we can do to fix it?', 2, 16);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (1,'2023-05-13 12:30:15','Im unable to access our financial reports on QuickBooks. Im receiving an error message that says Access denied. You do not have the necessary permissions to access this report. Ive tried logging out and logging back in, but the issue persists. Can anyone grant me acess?', 1, 17);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-13 13:24:10','Im looking into the issue and will update you as soon as I have more information.', 13, 16);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (3,'2023-05-13 14:10:15','Thanks for the update. Let me know if there is anything I can do to assist.', 2, 16);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (2,'2023-05-13 14:30:15','Hi Andrew, Ive updated your user permissions, and you should now be able to access the financial reports. Please let me know if you have any further issues.', 6, 17);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (4,'2023-05-13 14:43:15','I was able to resolve the issue with the customer database. It should be accessible now. Please confirm on your end.', 13, 16);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (5,'2023-05-13 14:49:00','Yes, the customer database is accessible now. Thank you for your help!', 2, 16);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (3,'2023-05-13 15:10:15','Thanks, everything looks good now. Im able to access the financial reports without any issues. I really appreciate your help!', 1, 17);
INSERT INTO Comment (num, date, content, user_id, ticket_id) VALUES (4,'2023-05-13 15:12:15','Youre welcome, Andrew. Glad I could help. Dont hesitate to reach out if you have any further issues.', 6, 17);