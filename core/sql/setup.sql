-- Create User Roles Table
CREATE TABLE IF NOT EXISTS user_roles
(
    id   INT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

-- Insert sample user roles
CREATE PROCEDURE IF NOT EXISTS CheckAndInsert()
BEGIN
    DECLARE count INT;

    SELECT COUNT(*) INTO count FROM user_roles;

    IF count = 0 THEN
        -- Perform the insert operation here
        INSERT INTO `user_roles` (`id`, `name`)
    VALUES (1, 'Admin'),
        (2, 'Doctor'),
        (3, 'Nurse'),
        (4, 'Patient');
    END IF;
END;
CALL CheckAndInsert();


-- Create Users Table
CREATE TABLE IF NOT EXISTS users
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50)  NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id  INT          NOT NULL,
    FOREIGN KEY (role_id) REFERENCES user_roles (id)
);

-- Create Patients Table
CREATE TABLE IF NOT EXISTS patients
(
    id            INT AUTO_INCREMENT PRIMARY KEY,
    name          VARCHAR(100) NOT NULL,
    date_of_birth DATE         NOT NULL,
    gender        VARCHAR(10)  NOT NULL,
    phone         VARCHAR(20),
    address       VARCHAR(200),
    user_id       INT          NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id)
);

-- Create Doctors Table
CREATE TABLE IF NOT EXISTS doctors
(
    id             INT AUTO_INCREMENT PRIMARY KEY,
    name           VARCHAR(100) NOT NULL,
    specialization VARCHAR(100) NOT NULL,
    contact_number VARCHAR(20),
    address        VARCHAR(200),
    user_id        INT          NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id)
);

-- Create Appointments Table
CREATE TABLE IF NOT EXISTS appointments
(
    id               INT AUTO_INCREMENT PRIMARY KEY,
    patient_id       INT          NOT NULL,
    doctor_id        INT          NOT NULL,
    appointment_date DATE         NOT NULL,
    reason           VARCHAR(200) NOT NULL,
    status           VARCHAR(20)  NOT NULL,
    FOREIGN KEY (patient_id) REFERENCES patients (id),
    FOREIGN KEY (doctor_id) REFERENCES doctors (id)
);

-- Create Departments Table
CREATE TABLE IF NOT EXISTS departments
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100) NOT NULL,
    description VARCHAR(200)
);

-- Create Wards Table
CREATE TABLE IF NOT EXISTS wards
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100) NOT NULL,
    description VARCHAR(200)
);

-- Create Medications Table
CREATE TABLE IF NOT EXISTS medications
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100) NOT NULL,
    description VARCHAR(200),
    dosage      VARCHAR(50)
);

-- Create Prescriptions Table
CREATE TABLE IF NOT EXISTS prescriptions
(
    id            INT AUTO_INCREMENT PRIMARY KEY,
    patient_id    INT NOT NULL,
    doctor_id     INT NOT NULL,
    medication_id INT NOT NULL,
    dosage        VARCHAR(50),
    instructions  VARCHAR(200),
    DATE          DATE,
    FOREIGN KEY (patient_id) REFERENCES patients (id),
    FOREIGN KEY (doctor_id) REFERENCES doctors (id),
    FOREIGN KEY (medication_id) REFERENCES medications (id)
);
