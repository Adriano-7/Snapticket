PRAGMA foreign_keys = ON;

--File Table
INSERT INTO File (file_id, file_name,date, file_type, content) VALUES (1, 'default.jpg', '2023-05-01 09:30:15', 'jpg', '/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjE4MDcwRTFGQjZGQzExRTVCN0I0RDI5QTQwNzA1QjVBIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjE4MDcwRTFFQjZGQzExRTVCN0I0RDI5QTQwNzA1QjVBIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDVFRTVGRDhCNkZDMTFFNUI0QjlFQkMyQjFGQTJBQjIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDVFRTVGRDlCNkZDMTFFNUI0QjlFQkMyQjFGQTJBQjIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAGfAZ8DAREAAhEBAxEB/8QAhQABAAIDAQEBAAAAAAAAAAAAAAYHAwQFCAIBAQEAAAAAAAAAAAAAAAAAAAAAEAEAAQMCAgUIBQkHAgcAAAAAAQIDBBEFMQYhQVESB2FxgaEiMhMUkbFCYiPB0VJygpKishXhwkNTcyQXM5Njg8M0VCVVEQEAAAAAAAAAAAAAAAAAAAAA/9oADAMBAAIRAxEAPwD0YAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADBl5mHh2vi5d+3j2/07tUURPm14gi24+KnKOHM02btzNrjqsUz3f3qtIBHczxpvzMxhbZTTHVXfuTM/u0xp6wci/wCLfNtyfY+WsR1dyzMz/FVINX/k/nT/AOZT/wBq3+YH7HihznExPzdE+SbVvT1QDbx/Fzmq3MfEoxr1PX3rdVM/TTV+QHYwvGmdYjO2vo66rFzWf3a4j6wSXbfE3lHNmKasqrEuT9nIpmmNezvRrAJNYv2Mi1F2xdovWp4XLdUVU/TGoMgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOVv3M+y7FZ+JuGRFFcxrRYp9q9V5qI6QVrvvi5u2V3rW1WowbM9EXa9K70x/LT6wQjMzs7OvTezL9zIuzxru1TVPrBrAAAAAAAA3du3fc9tuxdwMm5jVx126piJ88cJBO9h8YMu1NNre8eL9vhOTYiKbkeWqj3Z9GgLI2ffdp3fH+Pt2TRfo+1THRXT5KqZ6YBvgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA+Lt21ZtV3btdNu1biaq7lU6U0xHXMyCsubPFiqZrxNg6I6Yqz6o6f8AyqZ/mkFbZGRfyL1d/IuVXr1c613K5mqqZntmQYQAAAAAAAAAAAbODuGbt+TTk4V6vHv0e7ctzpP9oLS5S8VcfKqow987uPkTpTRmUxpaqn78fYny8PMCxImJiJiYmJjWJjpiYnsAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABp7pu2BtWDczc67FjHt8ap4zPVTTHXM9gKU5x553LmK9NqJnH2yifwsWJ97ThVd04z5OEAi4AAAAAAAAAAAAAAAJpyR4iZeyVUYWfNWRtMzpEca7OvXR20/d+gFy4eVjZeNbysa5Tex71MVW7lM6xMSDMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADV3PcsPbcG7nZlyLWPZjWuqfVER1zPUCiObebM7mPP+NembeJamYxcWJ9miO2e2qeuQcEAAAAAAAAAAAAAAAAAEr5H53yOXsv4V6aru03p/Gs669yf8yiO3tjrBd+PkWMqxbyMeuLti7TFdu5TOsVUzwmAZQAAAAAAAAAAAAAAAAAAAAAAAAAAAAflVVNFM11zFNFMTNVU9EREdMzIKO8QOcrm/7h8DHqmNqxapixT/mVcJu1f3fICJAAAAAAAAAAAAAAAAAAAAnvhnzpO25VO0Z1z/6/Iq/Arqnos3Z/u1fWC4gAAAAAAAAAAAAAAAAAAAAAAAAAAAAV14sc1zjY8bFiV6X8imK82qJ921PCj9vr8gKlAAAAAAAAAAAAAAAAAAAAABdnhnzXO77V8jlV97cMGIpmZ43LXCmrzxwkEzAAAAAAAAAAAAAAAAAAAAAAAAAABp7tumPtW25O4ZH/AEsaia5jrmeFNMeeegHnbcc/J3HPv52TV3r+RXNyuezXhEeSI6IBqgAAAAAAAAAAAAAAAAAAAAA6nLe9Xtk3nG3C1rpaq0vUR9q1V0V0/R6weh7F+1kWLd+zVFdm7TFduuOE01RrEgyAAAAAAAAAAAAAAAAAAAAAAAAAArPxi32aaMXZLVXTV/uMqI7OFumfXIKsAAAAAAAAAAAAAAAAAAAAAAABcnhJvs5mx3Ntu1a3tvq/D14zZuTrH7tWsAnYAAAAAAAAAAAAAAAAAAAAAAAAGsR0zOkR0zPkB535q3WrdeYs7OmdaLl6abXkt0ezTp6I1ByAAAAAAAAAAAAAAAAAAAAAAAASnw33b+nc24venSzl6413s9v3Z/e0BewAAAAAAAAAAAAAAAAAAAAAAAAOPzhuM7dyzuOXTOldFmqm3PZXX7FPrqB54iNI07AAAAAAAAAAAAAAAAAAAAAAAAAZLdy5auUXbc6XLdUV0T2VUzrE/SD0lt2ZRm7fjZtHu5Fqi7H7dMSDZAAAAAAAAAAAAAAAAAAAAAAABBvF3Lm1yxbsRPTk5FFMx92iJqn1xAKZAAAAAAAAAAAAAAAAAAAAAAAAABfPhtmTlcnbfMzrVZ79mr9iudP4ZgEmAAAAAAAAAAAAAAAAAAAAAAABWXjVen4W02Y66r1c/RREAq0AAAAAAAAAAAAAAAAAAAAAAAAAFyeD16a+W8i1M6/CyqpjzVUU/mBOwAAAAAAAAAAAAAAAAAAAAAAAVV40/wDu9r/07n80ArUAAAAAAAAAAAAAAAAAAAAAAAAAFt+DFcztO409VN+iY9NE/mBYgAAAAAAAAAAAAAAAAAAAAAAAKt8arc/G2m51TTdp+iaZ/KCsgAAAAAAAAAAAAAAAAAAAAAAAAAW/4N29Nhzq9PfyIjXt7tH9oLAAAAAAAAAAAAAAAAAAAAAAAABXnjNjzVtO35GnRav10TP+pRr/AOmCowAAAAAAAAAAAAAAAAAAAAAAAAAXb4T4/wALlGivT/r37tyJ8kaUf3ATIAAAAAAAAAAAAAAAAAAAAAAAEV8TML5rk/LmI1qx5ov0/sVaVT+7MgooAAAAAAAAAAAAAAAAAAAAAAAAAHoflDCnB5Y23GmNKqbFNVcdlVft1euoHYAAAAAAAAAAAAAAAAAAAAAAABgzcO3mYV/EuRrbyLdVqqPJXEwDzbkY93GyLuNdjS7Yrqt1+eidJ+oGEAAAAAAAAAAAAAAAAAAAAAAAHR5f22rc97wsCI1jIvU01x9yJ1r/AIYkHo6IimIpjhHRHmgAAAAAAAAAAAAAAAAAAAAAAAAAFKeKmzTt/M1WXRTpY3GmL0T1fEj2a4/KCFgAAAAAAAAAAAAAAAAAAAAAAAsXwd2abu45W7Xafw8Wj4Fmf/Eue99FMAtoAAAAAAAAAAAAAAAAAAAAAAAAAEW8RtgneOW7s2qe9l4MzfsRHGdI9umPPT64gFEgAAAAAAAAAAAAAAAAAAAAAA+6KK7ldNuimaq65imimOMzM6REA9C8pbFTsewY2DpHx4j4mVVHXer6avo4egHXAAAAAAAAAAAAAAAAAAAAAAAAAABRniLyxOyb9Xcs06YGbM3caeqmqZ9u36J4eQETAAAAAAAAAAAAAAAAAAAAABPfCrlidw3Wd3yKNcPBn8HXhXf6v3I6QXEAAAAAAAAAAAAAAAAAAAAAAAAAAADkc0cvYu/7PdwL2lNc+3j3f0Lke7Pm6pBQGdhZWDm3sPKom3kWKpouUT1TH5J6gawAAAAAAAAAAAAAAAAAAAOjsWy5u87pZ2/Ep1uXZ9qvqooj3q6vJAPQOz7VibVttjb8WnSzYp0ieuqftVVeWqQboAAAAAAAAAAAAAAAAAAAAAAAAAAAAIZ4icjxveJ89hUxG7Y9OkUx0fGoj7E/ej7P0ApaqmqmqaaommqmZiqmeiYmOMTAPgAAAAAAAAAAAAAAAAAGbGxsjKyLePj26rt+7VFNu3TGs1TPVAL05H5Pscu7fpXpc3HIiJyr0dMR2W6Z/Rp9YJKAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACB+IHh5TusV7ptVEUblEa3rEdEX4jrj7/1gqC5buW7lVu5TNFyiZproqjSYmOMTEgxgAAAAAAAAAAAAAAAz4eJk5mTbxsW1VeyLs923bojWZmQXVyLyHY2CzGVk6X91u06V1x002onjRR+WQS4AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEU5y8P8Df6asmzMYu6RHs39PZuadVyI/m4gprdtn3LaM2rE3CxVZvR7uvTTVHbTVwqgGgAAAAAAAAAAAAADq8v8t7rvuX8vgWu9ET+Lfq6LduO2qr8nEF0cp8l7Vy9Y1tR8fOrjS9l1x7U/doj7NIJEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADS3XZtt3bEnF3CxTfszw73vUz201R00z5gVbzJ4TbliTXf2Wqc7Hjp+Xq0i9THk6q/rBBL1m7Zu1Wr1FVq7T0VW64mmqPRIMQAAAAAAAAANjEw8vMv04+JZryL9XRTbt0zVV9EAsLlrwjv3JoyN/ufCo4/J2p1rn9euOiPNALNwdvwtvxqMXCs0Y+PR7tu3GkefyyDYAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABzt45e2beLfc3HEovzwpuTGlynzVx0ggm7+DduZmvaM2aOyxkxrHorp6fpiQQ/cfD/m7AmZu7fXetx/iWNLtOnb7PTHpgHBu2b1mqabtuq3VHRMV0zT9YMWsTwAAAmYjjIM1jGyciuKLFmu7VVwiimatfoBItu8OObs6YmMKca3P+JkzFvT9mda/UCY7P4OYNuabm7ZdWRPXYsfh0eaap9qfUCc7Xs+1bVZ+Dt+LbxrfCe5Gkz+tVxkG6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADmZnMuw4eVbxMncbNrJuVRTTamqNYmeHe0930g6YAAAAAAAMV/Hx8iNMizbvR2XKKa/wCaJBzL/J/Kt+db21Y1X7Hd/lmAav8Ax7yV/wDl2vpq/OBHh7yVExP9KtTp1TNUx9YNzH5T5XxZibG141Exw9iKv5tQdSzas2ae7Zt0Wqf0bdMUR9FMQD6AAAAAAB+V10UUVV11RTRTGtVUzpERHXMgwYedhZtmL2Fft5Fqft2qorj1A2AAAAAAAAAAAAAAAAAAAAAAAAAAR/mXnjY9hpmjIufGzNNacS1pNfk708KI84Kt5h8SeYt2mq1aufIYc9EWbEzFUx96570+gETnpmZnpmemZBNeT/ErcNnijD3DvZm2x0UzM63bUfdmfej7sgt3a9227dsWMrAv037M8Zp40z2VRxpnzg3AAAAAAAAAAAAAAAAAAc3fOYdp2PG+Y3C/FuJ1+HajpuVzHVTT1gp3m/xA3XmCqrHo1xNsifZxqZ6a/Ldq6/NwBHtv3PcNvvxfwci5jXo+3bqmNfPHCfSCw+XPF65TNGPv9nv08PnbMaVR5a7fX6AWTt+5YO4Y1OThX6MixVwronWPNPZPkkGyAAAAAAAAAAAAAAAAAAAAADFfv2MezXfv3KbVm3E1XLlc6U0xHXMyCrOb/FW/fmvC2CZs2PdrzpjS5V/pxPux5eIK7rrruVTXXVNVdU61VVTMzMz1zMg+AAAb217xuW05UZO35FePfjjNM+zVHZVTwqjzgs/lnxcwMruY++2/lL89HzVETNmqfvR71HrBPsfIx8i1Tex7lN+xX003LdUVUz5pgGQAAAAAAAAAAAAAGvnZ2FgWKsjMv0Y9injcuTFMf2grvmXxdt0xVj7Da79XCc29GlMfqUdfnkFa5udmZ+TXk5l6vIyK/euXJ1nzeSPJANYAAHR2Xf8Adtmyoyduv1Wq/t0caK4jqrp4SC4uUPEDbd/inHu6Ym56dOPM+zX2zbqnj5uIJYAAAAAAAAAAAAAAAAAAADT3Xd8DasK5m512LVi31zxqnqppjrmQUjzfzvuHMV+aJ1x9uonWziRPHsquae9V9QI0AAAAAADo7Tv28bRd+Jt2VXjzM61UROtFX61E60yCf7L4yzHdt7zh69uXjfXNur8kgm+1c38tbrEfJ59uq5P+DXPw7nm7tWmvoB2AAAAAAAAAJ6I1nhHGQcLdueOV9riYyM+iu7H+DY/Gr/h6I9Mggu9eMWbdiq1s2JTj0z0RkX/br9FEezHpBA9x3Xctyv8Ax8/JuZN3qmudYj9WOEegGmAAAAAD7pqqoqiuiqaa6Z1pqpnSYmOExMAtTkPxLjIm3tW/XIi/OlGLnVdEVzwim52VfeBZAAAAAAAAAAAAAAAAAANLd92wdpwLufnXPh49qOn9KqeqmmOuZBRXNfNefzFnzfv/AIeNbmYxsaJ9mintntqnrkHCAAAAAAAAAAB1tt5p5j26IjD3C9aop4W5q79EfsV96n1AkmD4vczWdIyLOPlUx20zbqn00zMeoHaxvGnHnT5raq4nr+Dcif5ogHRteMHLNUfiWcm1PZ3Iq+qQZ/8Alrk3/Myf+xP5wP8Alrk39PJ/7E/nBr3vGLlqiPwsfJuz2d2mj65Bzcrxqo0n5Tapmer492I/kiQcPN8Wuar8TFiLGJTPCaKO/VHprmY9QI3uHMO+bjrGdn3r9M8aKq5ij9yNKfUDmgAAAAAAAAAAs7w68QJiq3s28XtaZ0pwsuuemJ6rVdU/wyC0QAAAAAAAAAAAAAAAY8rJx8XHuZORci1YsUzXduVdERTHGQURzrzfkcx7h3o1t7fYmYxLE9n6dX3qvUCNgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAt3w154nOop2Xc7mubbjTEvVT03aI+xMz9uPXALCAAAAAAAAAAAAAABT/ifzlOflVbNhXP9jj1f7mumei7dp6v1aPrBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAZLV27Zu0XrNc27tuqKrddM6TTVHTEwC9uRebbfMW1RVcmKdxxtKMu3HXPVcpjsq+sElAAAAAAAAAAAABDvEnmz+ibV8ri16bjnRNNuY427fCq55+qAUiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADq8tb9lbFu1nPsazTTPdv2uqu3PvUz+Tyg9BYObjZ2DZzMWv4mPkURXbqjsnt8sdYNgAAAAAAAAAAGDNzcfCxL2Zk1dyxYom5cqnqiAeeuYt6yN73e/uF/om7Olqj9C3HuUx5oBzAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAWT4S80fBv1bBk1/hXpm5hTPVc410ftcYBawAAAAAAAAAAKy8XuY5pps7Bj1+9pfzdOz/Don6wVaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADLYv3se/bv2apov2qort1xxiqmdYkHoXljfbW+bHjbjRpFdyO7foj7N2norj6ekHVAAAAAAAABrbln2NvwMjNvzpZx7dVyvy92OEeWeEA867puORuW45GfkTreya5rq8mvCmPJEdANMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAE+8JeYZw92ubTeq/wBvn9NrXhTeoj+9T0AuEAAAAAAAAFceMG+/BwsbZrVXt5M/GydP8uifYj01dPoBU4AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAM2Pfu49+3fs1TRdsVU126o4xVTOsT9IPRWxbra3XaMTcbemmRbiqqmPs18K6fRUDfAAAAAAA6I6Z4RxB555u3id45hzM2KtbU1/Dx/9K37NOnn4g4wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALU8G9671nM2a5V025+ZxYnsq6K4j06SCywAAAAAAR/nzd52zlbNv01d2/dp+Xszwnv3ujo81OsgoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHa5O3f8ApXM2DmzV3bUXIt3+z4dz2atfNrr6AehQAAAAAAVb4zbprc27aqZ6KYqyLseWfZoifomQVkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD0Pyhun9T5Z2/Lme9cqtRRdnr79v2KtfPpqDsAAAAAAoLn/AHH+oc3bhcidbdquLFv9W1Gn16gjoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALc8G9w+JtGbgVT0416LtEfduxpPrpBYYAAAAMWTfox8e7frnSm1RVXVPZFMag81X79d+/cv1+/erquVeeuZqn6wYgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAATjwizfgcz148zpTl49VPnqomKqfygucAAAAHG5yuXrfK26VWaaqrvy9dMRREzPtR3Zno7I6QeeQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAASDkO7dtc37XXapqr/ABtKqaYmZ7tVM0zOkdUcQX+AAD//2Q==');

--Department Table
INSERT INTO Department (department_id, name) VALUES (1, 'Accounting');
INSERT INTO Department (department_id, name) VALUES (2, 'Legal');
INSERT INTO Department (department_id, name) VALUES (3, 'Human Resources');
INSERT INTO Department (department_id, name) VALUES (4, 'Sales');

--Hashtag Table
INSERT INTO Hashtag VALUES ('LackPermissions');

--Client Table
INSERT INTO Client (user_id, name,username,email,password) VALUES (1, 'Andrew Peterson', 'APeterson12', 'peterson_andrew@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (2, 'Emily Davis', 'EmilyDavis', 'EmilyDavis15@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (3, 'Adam Green', 'AGreen', 'Agreen@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (4, 'Jessica Ramirez', 'JessicaRamirez15', 'jessica_ramirez@snapticket.com','22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (5, 'Daniel Wilson', 'DWilson14', 'DWilson14@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (6, 'James Davis', 'JamesDavis', 'james_davis7@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (7, 'Jessica Murphy', 'JMurphy', 'jessica_murphy@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (8, 'Michael Brown', 'MBrown1', 'michael_brown24@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (9, 'Sarah Johnson', 'SarahJohnson7', 'sarah_johnson7@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (10, 'Christopher Chen', 'CChen', 'christopher_chen2@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (11, 'Samantha Kim', 'SKim', 'SKim@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (12, 'Andrew Patel', 'APatel', 'APat@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (13, 'Mattew Cooper', 'MCooper', 'MCooper12@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (14, 'Ethan Chen', 'EChen', 'EthanChen1@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (15, 'Benjamin Collins', 'BenjCollins', 'BCollins@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');
INSERT INTO Client (user_id, name,username,email,password) VALUES (16, 'Tyler Williams', 'TWilliams', 'TWilliams@snapticket.com', '22255db5e42ee69fcda1019d3cebb95e64b62f76');

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