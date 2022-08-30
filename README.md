# Henning Party

Henning.party is an interactive web app for hosting game night parties in your living room. All you need is a laptop, and a few friends with their mobile device, and together you can play games.

![Insert app screenshots](https://raw.githubusercontent.com/jacobshenning/henning-party/90556539fcf6abe6869143ea814e70bea5f4230a/Screen%20Shot%202022-08-29%20at%2010.15.51%20PM.png)

# Overview video

Here's a short video that explains the project.

[Insert your own video here, and remove the one below]

[![Embed your YouTube video](https://cdn.loom.com/sessions/thumbnails/bba207dc2d7b4ce4b2943c0255b85f98-with-play.gif)]https://www.loom.com/share/bba207dc2d7b4ce4b2943c0255b85f98)

## How it works

### How the data is stored and accessed:

The data is stored in the Redis DB. It is really cool.

 - For users, we store their name, and their current game.
   - Because we have to access users by their ID, email, and tokens (for authentication), we store additional index to find the user ID by.
 - For games, we store the ID, game details, and the connected users.
 - The game storage is a bit easier because we have a socket connection to the game, so we can just send the game state to the game, and it can send the game state back to us and the users. But keeping track of connections is pretty minimal.

## How to run it locally?

Running locally is pretty simple

`composer install`

`npm install`

`npm run dev`

`php artisan serve`

And for the socket server...

`php artisan socket:serve`

But make sure you install swoole first.

[Make sure you test this with a fresh clone of your repo, these instructions will be used to judge your app.]

- Install laravel swoole. I recommend this guide:
  https://openswoole.com/docs/get-started/installation

[Fill out with any prerequisites (e.g. Node, Docker, etc.). Specify minimum versions]

- I recommend using laravel valet. It's pretty easy to set up, and it's pretty easy to use. You can find the instructions here:
  https://laravel.com/docs/9.x/valet

