<?php
namespace App\Http\controllers;
use App\post;
class pagesController extends controller 
{
	public function getIndex()
	{
		$posts=post::orderBy('created_at','desc')->limit(4)->get();
		return view('pages.welcome')->withposts($posts);
		// return view('layouts.app');
	}
	public function getAbout()
	{
		 $first='Basanta';
		 $last='shahi';
		 $fullname=$first." ".$last;
		 $email='basanta999s@gmail.com';
		 $address="kapan";
		 $contact="9843312532";
		 $data=[];
		 $data['fullname']=$fullname;
		 $data['contact']=$contact;
		 return view('pages.About')->withData($data)->withEmail($email);
	} 
	public function getContact()
	{
		return view('pages.Contact');
	}
}