#Landing page: index.html

#Basic Feature: Real time shared file editing and project management teams

#Structure: 
You can be part of multiple teams -> Each team can have multiple projects -> Each project has multiple files, which can be edited in real time only by the members in the team
You cannot be part of multiple teams with the same name, or create multiple projects of the same name in the same team. (However, different teams can have projects of the same name)

#Each project page has a chat window for discussion

#Unique feature:
The app analyzes the contents of the project you're working on and generates a game based on the contents.
The game can be played by the members, while working on the project.
The games require at least 2 members of a project to be online on the project page

#The app includes 3 games so far
1. Word Association
wordGamev1.php 
#Description: 
A game that generates a random keyword from all the project files' content (Removes stopwords and punctuations) and gives you 3s to enter the first word that comes to your mind when you see the word.
Game over if you run out of time or type the same word twice.
The other players can see your prompts and responses in real time

2. Draw the word 
draw.php 
#Description:
A game where you have to draw an image to explain a word to your teammates. Again, the word is based on the project files' content.

3. StoryBoard
getImgForStoryboard.php 
#Description: 
Gets random combinations of keywords from the project, performs a google image search on them, and shows you 3 random images from the search.
Your task is to create a story out of these 3 images, which can be communicated via the chatbox.

The game files are embedded as iframes in newfile.php, which is the location for viewing project files, chat window or starting a game.


*********************************IMPORTANT**************************************
Since this app isn't hosted on a server yet, you need to host it using a local server like xampp.
Link for downloading xampp: https://www.apachefriends.org/download.html

Also, the app needs the creation of certain SQL Tables on the server. The required statements are as follows:

create database accountsremotecollab;

CREATE TABLE users (
Id INT(1) AUTO_INCREMENT NOT NULL UNIQUE,
username VARCHAR(50) PRIMARY KEY,
password	varchar(255) NOT NULL,
hash varchar(255) NOT NULL,
first_name varchar(50) NOT NULL,
last_name	varchar(50) NOT NULL,
email	varchar(100) UNIQUE NOT NULL,
active	tinyint(1) NOT NULL DEFAULT 0,
noOfTeams	int(11) NOT NULL DEFAULT 0,
teams	varchar(255) NOT NULL
);

CREATE TABLE teams (
teamId INT(1) AUTO_INCREMENT NOT NULL UNIQUE,
teamName varchar(100) PRIMARY KEY,
members	varchar(255) NOT NULL
);

CREATE TABLE activestatus (
username varchar(50) PRIMARY KEY,
tm datetime NOT NULL,
status tinyint(1) NOT NULL DEFAULT 0,
team varchar(100) NOT NULL,
project varchar(100) NOT NULL
);

