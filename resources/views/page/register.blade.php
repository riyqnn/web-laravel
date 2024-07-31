@extends('layout.master')

@section('judul')
<h1>Buat Account Baru</h1>
@endsection

@section('content')
<form action="/dashboard" method="POST">
    @csrf
    <label>Nama Depan:</label> <br>
    <input type="text" name="fname"><br><br>
    <label>Nama Belakang:</label> <br>
    <input type="text" name="lname"><br><br>
    <label>Gender:</label><br><br>
    <input type="radio" value="1" name="gdr">Male<br>
    <input type="radio" value="2" name="gdr">Female<br>
    <input type="radio" value="3" name="gdr">Other<br><br>
    <label>Nationality</label><br><br>
   <select name="warga negara" required>
     <option value="1">indonesia</option>
     <option value="2">Malaysia</option>
     <option value="3">Singapore</option>
     <option value="4">Other</option>
   </select>
    <br>
    <br>
    <label>Language Spoken</label><br><br>
    <input type="checkbox" name="Language Spoken">Bahasa indonesia<br>
    <input type="checkbox" name="Language Spoken">English<br>
    <input type="checkbox" name="Language Spoken">Other<br><br>
    <label>Bio:</label><br>
    <textarea name="message" id="" rows="10"cols="30" required></textarea><br><br>
   
    <button type="submit" >Sign up</button>
</form>

@endsection