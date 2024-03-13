-- Departments Table
CREATE TABLE Departments (
    DepartmentID INT PRIMARY KEY,
    DepName VARCHAR(255) NOT NULL,
    DepDescription TEXT
);

-- Programmes Table
CREATE TABLE Programmes (
    ProgrammeID INT PRIMARY KEY,
    DepartmentID INT,
    ProgName VARCHAR(255) NOT NULL,
    ProgDuration INT,
    ProgDescription TEXT,
    FOREIGN KEY (DepartmentID) REFERENCES Departments(DepartmentID)
);

-- Modules Table
CREATE TABLE Modules (
    ModuleID INT PRIMARY KEY,
    ProgrammeID INT,
    ModSemester INT,
    ModName VARCHAR(255) NOT NULL,
    ModDescription TEXT,
    ModDuration INT,
    FOREIGN KEY (ProgrammeID) REFERENCES Programmes(ProgrammeID)
);

-- Lecturers Table
CREATE TABLE Lecturers (
    LecturerID INT PRIMARY KEY,
    LectName VARCHAR(255) NOT NULL,
    DepartmentID INT,
    LectEmail VARCHAR(255),
    LectPhone VARCHAR(20),
    FOREIGN KEY (DepartmentID) REFERENCES Departments(DepartmentID)
);

-- Rooms Table
CREATE TABLE Rooms (
    RoomID INT PRIMARY KEY,
    RoomName VARCHAR(255) NOT NULL,
    RoomType VARCHAR(50),
    RoomCapacity INT
);

-- Sessions Table
CREATE TABLE Sessions (
    SessionID INT PRIMARY KEY,
    ModuleID INT,
    RoomID INT,
    StartTime TIME,
    EndTime TIME,
    SessionDate DATE,
    FOREIGN KEY (ModuleID) REFERENCES Modules(ModuleID),
    FOREIGN KEY (RoomID) REFERENCES Rooms(RoomID)
);

-- ProgrammeModules Linking Table
CREATE TABLE RoomModules (
    RoomID INT,
    ModuleID INT,
    FOREIGN KEY (RoomID) REFERENCES Rooms(RoomID),
    FOREIGN KEY (ModuleID) REFERENCES Modules(ModuleID),
    PRIMARY KEY (RoomID, ModuleID)
);

-- LecturerModules Linking Table
CREATE TABLE LecturerModules (
    LecturerID INT,
    ModuleID INT,
    FOREIGN KEY (LecturerID) REFERENCES Lecturers(LecturerID),
    FOREIGN KEY (ModuleID) REFERENCES Modules(ModuleID),
    PRIMARY KEY (LecturerID, ModuleID)
);

-- Students Table
CREATE TABLE Students (
    StudentID INT PRIMARY KEY,
    StudentName VARCHAR(255) NOT NULL,
    StudentEmail VARCHAR(255),
    ProgrammeID INT,
    StudentSemester INT,
    FOREIGN KEY (ProgrammeID) REFERENCES Programmes(ProgrammeID)
);