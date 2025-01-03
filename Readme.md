Here's a `README.md` file for your project based on the provided database schema and queries:

```markdown
# Assignment Portal

This project is an **Assignment Portal** where users (students) can register, submit assignments, and manage them. The portal includes a database for storing user details, assignment submissions, and assignment information. The system supports user authentication, assignment submission, and viewing assignment details.

## Database Structure

The project uses the following tables:

### 1. `users`
This table stores the registered students' details.
- `id` (INT, AUTO_INCREMENT) - Primary Key
- `student_id` (VARCHAR(50), UNIQUE, NOT NULL) - The unique identifier for each student.
- `password` (VARCHAR(255), NOT NULL) - The password for the student.

### 2. `submissions`
This table stores information about assignments that have been submitted by students.
- `id` (INT, AUTO_INCREMENT) - Primary Key
- `student_id` (INT, NOT NULL) - ID of the student who submitted the assignment.
- `assignment_name` (VARCHAR(255), NOT NULL) - Name of the assignment.
- `assignment_image` (VARCHAR(255), NOT NULL) - Image related to the assignment.
- `submission_time` (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP) - Timestamp of when the assignment was submitted.

### 3. `assignments`
This table stores the assignment details for each student.
- `id` (INT, AUTO_INCREMENT) - Primary Key
- `student_id` (INT, NOT NULL) - ID of the student submitting the assignment.
- `name` (VARCHAR(255), NOT NULL) - Name of the assignment.
- `subject` (VARCHAR(255), NOT NULL) - Subject of the assignment.
- `file_link` (VARCHAR(500), NOT NULL) - Link to the assignment file.
- `created_at` (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP) - Timestamp of when the assignment was created.

## SQL Queries

### Create Tables
Run the following SQL queries to create the necessary tables in your database (`assignment_portal`):

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    assignment_name VARCHAR(255) NOT NULL,
    assignment_image VARCHAR(255) NOT NULL,
    submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE assignments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    file_link VARCHAR(500) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Insert Sample Data
To insert some sample data into the `users` table, run the following SQL queries:

```sql
INSERT INTO users (student_id, password) VALUES ('37201', 'admin1122');
INSERT INTO users (student_id, password) VALUES ('67890', 'testpassword');
INSERT INTO users (student_id, password) VALUES ('11111', 'mypassword');
```

## How to Use

1. **Database Setup**: 
   - Create a MySQL database named `assignment_portal`.
   - Run the SQL queries provided above to create the necessary tables and insert sample data.

2. **User Registration**: 
   - A student can register by providing their `student_id` and `password`.
   
3. **Assignment Submission**:
   - Students can submit assignments by uploading the assignment file and providing the assignment details.
   
4. **View Assignments**: 
   - Students can view the assignments they have submitted and the details of the assignments.

## Technologies Used
- **PHP** (for backend logic)
- **MySQL** (for database management)
- **HTML** (for frontend structure)

## License

This project is open-source and available under the [MIT License](LICENSE).
```

This `README.md` file provides an overview of the database structure, SQL queries, and how to use the system. You can customize it further depending on your project’s implementation and additional details you might need to include.