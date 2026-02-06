# 🎯 Event Survey & Certificate Management System

A Laravel-based web application to manage events, collect participant registrations,
send surveys automatically, and generate certificates after survey submission.

This project is designed as a real-world admin + user workflow system.

---

## 🚀 Features

### 🔹 Event Management
- Create, view, and delete events
- Online / Offline event mode
- Assign surveys to specific events

### 🔹 Survey Builder
- Create reusable surveys
- Add Text & MCQ questions
- Save survey as Draft or Publish
- Assign existing survey to events

### 🔹 Registration Flow
- Users can register for events
- Email validation & phone number validation
- Automatic survey link sent to registered users

### 🔹 Survey System
- Dynamic survey form rendering
- Supports Text & MCQ questions
- Survey submission tracking
- Prevents invalid submissions

### 🔹 Certificate Automation
- Certificate automatically sent after survey submission
- Email-based certificate delivery

### 🔹 Reports & Admin Dashboard
- Event-wise registrations report
- Survey submission reports
- Admin dashboard for event → survey mapping

---

## 🛠 Tech Stack

- **Backend:** Laravel
- **Frontend:** Blade, Bootstrap
- **Database:** MySQL
- **Email:** SMTP (Gmail)
- **Version Control:** Git & GitHub

---

## 📂 Project Setup

### 1️⃣ Clone the repository
```bash
git clone https://github.com/your-username/event-survey-system.git
cd event-survey-system
2️⃣ Install dependencies
composer install
3️⃣ Configure environment
cp .env.example .env
php artisan key:generate
Update .env file with:
Database credentials
Mail SMTP configuration
4️⃣ Run migrations
php artisan migrate
5️⃣ Start the server
php artisan serve
Application will run on:
http://127.0.0.1:8000
📧 Mail Configuration (SMTP)

Example (Gmail):
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="Event Survey System"

🧠 System Workflow
Admin creates an event
Admin creates or assigns a survey
User registers for event
Survey link sent via email
User submits survey
Certificate automatically emailed
Admin views reports

📊 Reports Available
Event-wise registrations
Survey responses with questions & answers
Survey submission count per event

📌 Future Enhancements
Survey preview mode
Certificate PDF download
Analytics charts
Role-based access (Admin/User)
Export reports (CSV / Excel)

Author -> Sneha Baldeva 
