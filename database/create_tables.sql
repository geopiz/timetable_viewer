-- Departments Table
CREATE TABLE Departments (
    DepartmentID INT,
    DepName VARCHAR(255) NOT NULL,
    DepDescription TEXT
);

-- Programmes Table
CREATE TABLE Programmes (
    ProgrammeID INT,
    DepartmentID INT,
    ProgName VARCHAR(255) NOT NULL,
    ProgDuration INT,
    ProgDescription TEXT
);

-- Modules Table
CREATE TABLE Modules (
    ModuleID INT,
    ProgrammeID INT,
    ModSemester INT,
    ModName VARCHAR(255) NOT NULL,
    ModDescription TEXT,
    ModDuration INT
);

-- Lecturers Table
CREATE TABLE Lecturers (
    LecturerID INT,
    LectName VARCHAR(255) NOT NULL,
    DepartmentID INT,
    LectEmail VARCHAR(255),
    LectPhone VARCHAR(20)
);

-- Rooms Table
CREATE TABLE Rooms (
    RoomID INT,
    RoomName VARCHAR(255) NOT NULL,
    RoomType VARCHAR(50),
    RoomCapacity INT
);

-- Sessions Table
CREATE TABLE Sessions (
    SessionID INT,
    ModuleID INT,
    RoomID INT,
    StartTime TIME,
    EndTime TIME,
    SessionDate DATE
);

-- ProgrammeModules Linking Table
CREATE TABLE RoomModules (
    RoomID INT,
    ModuleID INT
);

-- LecturerModules Linking Table
CREATE TABLE LecturerModules (
    LecturerID INT,
    ModuleID INT
);

-- Students Table
CREATE TABLE Students (
    StudentID INT,
    StudentName VARCHAR(255) NOT NULL,
    StudentEmail VARCHAR(255),
    ProgrammeID INT,
    StudentSemester INT
);