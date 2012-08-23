#SOWComposer
SOWComposer is a tool that helps people inside the government write statements of work that work for the web and small businesses. By that we mean that the statements of work are:

1. Easy to understand
2. Discoverable by great businesses
3. Specific

## Easy Setup

1. [Download](https://github.com/presidential-innovation-fellows/sowcomposer/zipball/master) the application
2. Edit application/config/database.php to suit your needs, and create a database if you need to
3. Run the necessary migrations:

```shell
php artisan migrate:install
php artisan migrate
```

4. Import the templates

```shell
php artisan Templateimport
```

5. Point your webserver's root directory to the `public/` directory
6. Hit it with your browser.

## What it's designed to do

SOWComposer takes templated statements of work (see the project's _templates directory) and makes the deliverables and requirements selectable, and makes it so that the statement of work can be "filled out" using a fill-in-the-blanks method. This helps make it so efforts inside government aren't duplicated, and makes it so contracting officers are familiar with the language that's coming out of the tool.

In addition, SOWComposer is designed to be educational: to help educate program offices inside of government better understand the technology components of what they're buying when they're crafting a statement of work.

Finally, SOWComposer is designed to be for small purchases -- generally professional services that we think could fall under the Simplified Acquisition Threshold. It's not designed for large RFPs.

## Where we're at

At this point, SOW Composer is a starting point for a conversation, and is nowhere near being a finished product. We wanted to make something that demonstrates the idea, but we want you to help us figure out how it can be great.

Everybody has a stake in the crafting of statements of work: program offices, contracting officers, and businesses. We cannot built this in a vacuum. Take a look at the _templates directory. What's missing? If you have edits, please fork the project, change the template, and send us a pull request, and it may be incorporated.

Also -- if you work for another kind of government -- like a municipal or state government, SOWComposer might be a good idea for you to keep an eye on. It could help streamline your purchasing processes, too. We'd love for this to be a collaborative effort to make statements of work a delight to make.

## Who Made This
This is a project of the Presidential Innovation Fellowship RFP-EZ team including Jed Wood, Adam Becker, and Clay Johnson.

## Contributing

Federal employees and members of the public are encouraged to contribute to the project by forking and submitting a pull request. (If you are new to GitHub, you might start with a basic tutorial.)

All contributors retain the original copyright to their code, but by contributing to this project, grant a world-wide, royalty-free, perpetual, irrevocable, non-exclusive, transferable license to all users under the terms of the MIT License.

Comments, pull requests and any other messages received through official White House pages are subject to the Presidential Records Act and may be archived. Learn more at http://WhiteHouse.gov/privacy

## License
This project constitutes an original work of the United States Government.

You may use this project under the [MIT License](http://opensource.org/licenses/mit-license.php).
