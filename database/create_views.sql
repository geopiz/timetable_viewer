Create VIEW Sessions_view AS
SELECT SessionDate"Session Date", StartTime as "Start Time", EndTime as "End Time", ModName as "Module Name", LectName as "Lecturer"
FROM Sessions as s
join Modules as m on s.ModuleID = m.ModuleID
join LecturerModules as lm on m.ModuleID = lm.ModuleID
join Lecturers as l on lm.LecturerID = l.LecturerID
join Students as st on m.ProgrammeID = st.ProgrammeID and m.ModSemester = st.StudentSemester





