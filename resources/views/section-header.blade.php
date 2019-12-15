<table class="sec-head">
    <tr>
           <th class="heading"><span>i</span>Manage Section</th>
           <th>Doctor</th>
           <th>Patient</th>
           <th>Nurse</th>
    </tr>
    <tr>
           <td></td>
           <td>{{ $get=DB::table('doctors')->count('id') }}</td>
           <td style="color:red;">{{ $get=DB::table('patients')->count('id') }}</td>
           <td>{{ $get=DB::table('nurses')->count('id') }}</td>
    </tr>
</table>