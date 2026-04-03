<img src="docs\SnapTicket_logo.png" height="80">


> **Project**
> <br />
> Course Unit: [Web Languages and Technologies (LTW)](https://sigarra.up.pt/feup/pt/ucurr_geral.ficha_uc_view?pv_ocorrencia_id=501681), 3rd year
> <br />
> Course: Degree in Informatics and Computing Engineering
> <br />
> Faculty: **FEUP** (Faculty of Engineering of the University of Porto)
> <br />
> Project evaluation: **18**/20

---

## Project Goals

SnapTicket is a web application designed to help users submit, track, and resolve support tickets. It implements a fully functional role-based ticketing system where users can seek assistance, agents can resolve problems, and administrators can manage the overarching structure of the organization.

## Technical Approach

The project was developed from scratch without using heavy web frameworks to solidify our understanding of core web technologies and vanilla PHP backend architecture. 

### Architecture & Backend
- **Design Pattern**: We adopted an MVC-like structure separating concerns into `pages/` (views/controllers), `templates/` (UI components), `actions/` (form processing), and `database/php_classes/` (models).
- **Database**: We used **SQLite**. We used **SQL Triggers** to automatically generate notifications (e.g., when a ticket is assigned or changes status) and to maintain an immutable history log for every ticket.
- **Security**: 
  - Implementation of **CSRF tokens** across all state-changing forms to prevent Cross-Site Request Forgery.
  - **XSS prevention** using `htmlspecialchars` and `htmlentities` on user inputs.
  - Secure password storage using `password_hash()` with BCRYPT.
  - Strict server-side and client-side regex validations.

### Frontend & Dynamic UI
- **Asynchronous Filtering**: Developed custom REST-like API endpoints (`apiTickets.php`, `apiMembers.php`) paired with vanilla JavaScript `fetch()` to allow real-time filtering, searching, and sorting of tickets and members without page reloads.
- **Responsive Design**: Custom CSS (using Flexbox and CSS Grid) ensures the dashboard, ticket views, and forms are fully responsive and intuitive across desktop and mobile devices.

## Running the code

**1. Clone the repository:**
```bash
git clone https://github.com/Adriano-7/snapticket
cd snapticket
```

**2. Start a local PHP server:**
```bash
# Run this command in the root directory of the project
php -S localhost:9000
```

**3. Access the application:**
Open your browser and navigate to `http://localhost:9000`.

**Test Credentials:**
Every user in the populated database has the password `Qwerty12`. You can test different roles using:
- **Admin**: `JMurphy`
- **Agent**: `JamesDavis`
- **Client**: `APeterson12` or `JessicaRamirez15`

## Tech Stack

- **Backend**: PHP 8 (Vanilla, PDO)
- **Database**: SQLite3
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla, Fetch API)

## Class Diagram
<img src="docs\Database_uml.jpg" height="375">

## Screenshots
<img src="docs\Screenshot1.png"> 
<img src="docs\Screenshot2.png">
<img src="docs\Screenshot3.png">
<img src="docs\Screenshot4.png">
<img src="docs\Screenshot5.png">
<img src="docs\Screenshot6.png">
<img src="docs\Screenshot7.png">

## Team
- <a href="github.com/Adriano-7">Adriano Machado</a>
- <a href="github.com/Evans2424">José Pedro Evans</a>
- <a href="https://github.com/Hmgc2002">Hugo Costa</a>
