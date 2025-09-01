# Doctor Reservation System (Vezeeta Clone)

A web-based **Vezeeta-like doctor appointment booking system** built with **Laravel** as part of an NTI training team project.  
The system replicates the core features of Vezeeta: patients can search for doctors, view profiles, and book appointments, while administrators can manage doctors, appointments, and users.  

---

## Features

### Patient Side
- Register, log in, and manage profile  
- Search doctors by specialty and location  
- View doctor details and available slots  
- Book and manage appointments  

### Doctor Side
- Manage personal profile and availability  
- View scheduled appointments  

### Admin Side
- Add and manage doctors  
- Manage appointments and patient records  
- Access admin dashboard with system overview  

---

## Tech Stack
- **Backend**: Laravel 11, PHP  
- **Frontend**: Blade templates, Bootstrap 5  
- **Database**: MySQL  
- **Authentication**: Laravel Breeze  
- **Other**: Eloquent ORM, MVC pattern  

---

## Installation

1. Clone the repository  
   ```bash
   git clone https://github.com/your-username/doctor-reservation-system.git
   cd doctor-reservation-system
````

2. Install dependencies

   ```bash
   composer install
   npm install && npm run dev
   ```

3. Configure environment

   * Copy `.env.example` to `.env`
   * Set database credentials

4. Run migrations and seeders

   ```bash
   php artisan migrate --seed
   ```

5. Start development server

   ```bash
   php artisan serve
   ```

---

## Screenshots

*Add screenshots here (Patient Dashboard, Doctor Profile, Admin Panel).*

---

## Contributors

This project was developed by a **team of 4 members** as part of NTI training.

* [Mohamed Ahmed Mohamed Abdallah](https://github.com/mohamed-ahamed-mohamed-2026)
* [Rania_Raafat](https://github.com/mohrael)
* [Mariam El-Habashi](https://github.com/mariamhabashi)
* [sh-toqa](https://github.com/sh-toqa)

---

## License

This project is for educational and training purposes only.

```

Do you want me to also add a **demo section** (like “Live Demo” or “Video Walkthrough”) in case later you deploy it or upload a screen recording?
```
