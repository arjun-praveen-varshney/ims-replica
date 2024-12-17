<label>Name:</label>
<input type="text" name="Name_Of_The_Student" value="{{ old('Name_Of_The_Student', $student->Name_Of_The_Student ?? '') }}">
<label>Roll No:</label>
<input type="text" name="Roll_no" value="{{ old('Roll_no', $student->Roll_no ?? '') }}">
<label>Branch:</label>
<input type="text" name="Branch" value="{{ old('Branch', $student->Branch ?? '') }}">
<label>Year Of Study:</label>
<input type="number" name="Year_Of_Study" value="{{ old('Year_Of_Study', $student->Year_Of_Study ?? '') }}">
<label>Title Of Course:</label>
<input type="text" name="Title_Of_Course" value="{{ old('Title_Of_Course', $student->Title_Of_Course ?? '') }}">
<label>Organizing Body:</label>
<input type="text" name="Organizing_Body" value="{{ old('Organizing_Body', $student->Organizing_Body ?? '') }}">
<label>Duration:</label>
<input type="text" name="Duration" value="{{ old('Duration', $student->Duration ?? '') }}">