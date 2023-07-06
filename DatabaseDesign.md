# Database Design Explanation

This database design consists of several tables to manage user roles, users, patients, doctors, appointments, departments, wards, medications, and prescriptions. Let's go through each table and its purpose:


## User Roles Table

- Table Name: `user_roles`
- Columns: `id` (Primary Key), `name`
- Purpose: This table stores the various roles that users can have in the system, such as Admin, Doctor, Nurse, or Patient.

## Users Table

- Table Name: `users`
- Columns: `id` (Auto-incremented Primary Key), `username`, `password`, `role_id`
- Purpose: This table stores user information, including their username, password, and associated role. The `role_id` column references the `id` column in the `user_roles` table.

## Patients Table

- Table Name: `patients`
- Columns: `id` (Auto-incremented Primary Key), `name`, `date_of_birth`, `gender`, `phone`, `address`, `user_id`
- Purpose: This table stores information about patients, including their name, date of birth, gender, contact details, address, and the associated user in the `users` table.

## Doctors Table

- Table Name: `doctors`
- Columns: `id` (Auto-incremented Primary Key), `name`, `specialization`, `contact_number`, `address`, `user_id`
- Purpose: This table stores information about doctors, including their name, specialization, contact number, address, and the associated user in the `users` table.

## Appointments Table

- Table Name: `appointments`
- Columns: `id` (Auto-incremented Primary Key), `patient_id`, `doctor_id`, `appointment_date`, `reason`, `status`
- Purpose: This table manages appointments between patients and doctors. It stores the patient's ID, doctor's ID, appointment date, reason for the appointment, and the status of the appointment.

## Departments Table

- Table Name: `departments`
- Columns: `id` (Auto-incremented Primary Key), `name`, `description`
- Purpose: This table stores information about various departments in the healthcare system, such as Cardiology, Neurology, etc.

## Wards Table

- Table Name: `wards`
- Columns: `id` (Auto-incremented Primary Key), `name`, `description`
- Purpose: This table stores information about wards in the healthcare system, such as General Ward, ICU, etc.

## Medications Table

- Table Name: `medications`
- Columns: `id` (Auto-incremented Primary Key), `name`, `description`, `dosage`
- Purpose: This table stores information about different medications, including their name, description, and dosage instructions.

## Prescriptions Table

- Table Name: `prescriptions`
- Columns: `id` (Auto-incremented Primary Key), `patient_id`, `doctor_id`, `medication_id`, `dosage`, `instructions`, `date`
- Purpose: This table manages prescriptions. It stores the patient's ID, doctor's ID, medication ID, dosage instructions, additional instructions, and the date of the prescription.

The provided SQL statements create the necessary tables with their respective columns. Additionally, there's a stored procedure called `CheckAndInsert` that checks if the `user_roles` table is empty and inserts sample user roles if needed.

It's important to note that this is a simplified representation of a database design and might not encompass all the necessary fields and relationships required for a comprehensive healthcare system. However, it provides a foundation for managing user roles, patient and doctor information, appointments, departments, wards, medications, and prescriptions.
