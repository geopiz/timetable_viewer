import sqlite3

# Connect to your SQLite database. If the file does not exist, SQLite will create it.
conn = sqlite3.connect('database/datqabase.db')  # Replace with your database file path

# Create a cursor object using the cursor method
cursor = conn.cursor()

# SQL statement to insert data into the Students table
sql_insert_query = """DELETE FROM Students WHERE StudentID IN (2);"""

# Data to insert

# Executing the SQL statement
cursor.execute(sql_insert_query)

# Commit your changes in the database
conn.commit()

# Close the connection when done
conn.close()

print("Data inserted successfully.")
