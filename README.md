#Test Project

##routes : 


######GIF/login
######GIF/register

and after loging in, you will be redirected to '**GIF/gifs**'

#

######GIF/gifs

in this route you will find search input box, so you can search about gifs, 
and it will be viewed as thumbnail

you can find in each gif card favorite button to add this gif to your favorite list

you can view your favorite list in the route '**GIF/favorite**' by pressing on it in the side bar

and you can also view your search history ( words you searched about in the search input box ) 
in this route '**GIF/history**' by pressing on it in side bar

also in each card you will find share button, after pressing on it, waite till a popup modal give you a minified url
in the link **http://localhost/GIF/gifdetails/:id**
after pasting the minified link in new tab, the window will be redirected 
to the destination page and give you another choice of redirection by 
pressing on button '**go to your link**'
note : that if the minified url have charchter like '**+**' will not work

#
######GIF/favorite
to list your favorite gifs
######GIF/gifs
to list you search history

#

##instruction : 
the database in the path : 

GIF\gif.sql
create new database in mysql named '**gif**' then do import of '**gif.sql**' file

then put the folder in htdocs and open the url : 
**localost:80/GIF**