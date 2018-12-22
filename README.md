# QChatterServer
The QChatterServer source code.

REST API FOUND HERE: http://teamweflatt.ddns.net/QChatter/web/docs/

*QChatterServer, version 1.0*
## Synopsis/Hosting Instructions

QChatter is a free method of textual communication between two or more parties. 

QChatter does not attempt to compete with any other service or method of communication; however, it tries to emulate very important facets of a modern textual communication program. 

QChatter does not log messages, and *never* will, because of the philosophy it has. QChatter resembles IRC, but is potentially much more advanced and capable than IRC.

QChatter has an idea of end-to-end encryption in mind, but it is not implemented right now, due to certain reasons to which I cannot elucidate on.

This repository mainly includes the source code for the back-end of QChatter, which is made in PHP. 

Many people call PHP a poor language--and they are not really wrong, but a framework instantly fixes this--however I chose to use it because it's open source, fast (faster than Python, Perl, and Ruby, according to https://bit.ly/2CtLwD9), easy to understand, C-like, and widely used (about 80% of the web uses PHP, according to https://bit.ly/2V4RIsv).

To host you need:

 - PHP 7
 - Apache or any HTTPD that allows for denying of directories and can run PHP
 - GNU/Linux, BSD, or any variants
 - A mind poised for random errors within the server (for now)
 
 You must place QChatterServer into a directory, of which your HTTPD is hosting. You must then create a **channel** and **user** folder in the directory that QChatterServer is in. This is required. Then, use your HTTPD to deny access to those directories, since they contain extremely sensitive credentials and information, such as passwords, usernames, and temporary messages.

Then, get your QChatter client, and connect. I'm hosting a server at http://teamweflatt.ddns.net/QChatter/QChatterServer/


Right now, this program is:

 - Sloppy
 - Unorganized
 - Unclear, ambiguous, enigmatic
 - Unprofessional
 - Prone to errors
 - Lacking of proper implementation of things
 - Devoid of a proper database system
 
QChatter doesn't use a database, and it never will for some things. I thought to myself, "Why have everyone in some big file that gets bloated quickly?" and I turned out to like this idea, but the absence of a proper database is mostly due to the fact that I am to lazy to learn an SQL language.

To send and receive messages, QChatter sends your message to someone's "message inbox." When they check this inbox, the message there is deleted off of the server, and they can see your message, and vice versa. 

Channels are basically folders with files containing: the master password, the user list, and the operators. 

## Philosophy

Being an advocate of free software and software freedom, this program seems almost contradictory, since with a server, you do not know what is really going on on the other end. Someone who hosts this could change the source code so that it violates many basic user rights, like logging information or doing something sneaky--but in itself, they can lie about what the source code is.

I propose a method where you can see the source code live on the machine that is hosting it, so that you know what happens when you send your information over. 

Why didn't I make this P2P, like Tox and many other privacy advocating programs have already done? Well, I had a problem with P2P, that it reveals your IP Address eventually (if not using Tor) to the other user(s). Would you rather trust another person (such as a friend) or a server? I'd personally trust a friend, but their ISP can still peer into the conversation, somewhat, even if it has end-to-end encryption, the ISP can see what *you* sent to their IP Address. Now, it links your IP Address to theirs, jeopardizing both of you. With a server, your ISP only knows the server's IP Address, and not your friend's. 

Really, there is nothing stopping you from combining QChatter with Tor, so it really isn't a problem. You get more features, and you get some semblance of basic privacy. We could also make QChatter a hybrid between a server and P2P, and communicate with Tor nodes, if we want to implement calling and image sharing.

## End
This is probably the most ambitious of my various programming projects, and I don't know where this will go.

 
