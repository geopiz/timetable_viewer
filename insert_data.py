import sqlite3

# Connect to your SQLite database. If the file does not exist, SQLite will create it.
conn = sqlite3.connect('database/datqabase.db')  # Replace with your database file path

# Create a cursor object using the cursor method
cursor = conn.cursor()

# SQL statement to insert data into the Students table
sql_insert_query = """INSERT INTO Students (StudentID, Name, Email, ProgrammeID, Semester)
VALUES (?, ?, ?, ?, ?);"""

# Data to insert
student_data = (3, 'Nikos Koukos', 'NikosKoukos@university.edu', 1, 2)

# Executing the SQL statement
cursor.execute(sql_insert_query, student_data)

# Commit your changes in the database
conn.commit()

# Close the connection when done
conn.close()

print("Data inserted successfully.")