# Server Admin Tracker

This project is still under development.

This tool will allow you to add metadata about a Client's server, Ticket communications as well as Migration Status. The idea behind this tool is to assist with keeping track of all tasks that need to be completed, and which date they should be completed on or before. As this will be uploaded to a server that may be somewhat public, a Login will be used. I will then also be able to provide my Manager with a link to the site to allow him access to view the work that is currently being completed or pending completion.  

## Installation

Please ignore the upload.php file. :(

## Database Setup

The database is currently set up with the following fields: 
_ _ _ _ _ _ _ _ _ _ 
id ; 
ticket_id ; 
client_contact ; 
client_servername ; 
server_type ; 
migration_type ; 
migration_date ; 
migration_status ; 
- - - - - - - - - -

The insert.php file currently pulls the information from the form located on the index.php file and outputs the information in a table above the form.

## Config File

To be added.

## User Creation

To be added.

## Known Bugs

There are probably several bugs. I am still working on this. :)

1. Currently the form is using a $_GET method as my Local machine was giving errors. Embarrassing.
