/* portfolio/workflow
 *
 * /Gruntfile.js - Grunt configuration file
 *
 * coded by Gabriel!
 * started at 7/06/2016
 */

"use strict";

module.exports = function( grunt ) {

    // 1. load tasks
    grunt.loadNpmTasks( "grunt-contrib-watch" );
    grunt.loadNpmTasks( "grunt-cowsay" );
    grunt.loadNpmTasks( "grunt-eslint" );
    grunt.loadNpmTasks( "grunt-browser-sync" );
    grunt.loadNpmTasks( "grunt-sass" );
    grunt.loadNpmTasks('grunt-postcss');//new task for autoprefixer

    // 2. configure tasks
    grunt.initConfig( {
        // browser sync
        "browserSync": {
            "preview": {
                "bsFiles": {
                    "src": "css/*.css"
                },
                "options": {
                    "proxy": "localhost:8888", // TODO: adapt to you configuration
                    "watchTask": true
                }
            }
        },
        // cowsay
        "cowsay": {
            "done": {
                "options": {
                    "message": "I'm done!"
                }
            }
        },
        // eslint
        "eslint": {
            "options": {
                "configFile": ".eslintrc.json"
            },
            "scripts": [ "scripts/**/*.js" ]
        },
        // sass
        "sass": {
            "options": {
                "sourceMap": true
            },
            "styles": {
                "files": {
                    "css/styles.css": "sass/styles.scss"
                }
            }
        },
        // watch
        "watch": {
            "options": {
                "spawn": false
            },
            "scripts": {
                "files": [ "scripts/**/*.js" ],
                "tasks": [ "eslint" ]
            },
            "styles": {
                "files": [ "sass/**/*.scss" ],
                "tasks": [ "sass:styles" ]
            }
        }/*,
        "postcss": {
            "options": {
                "map": true // inline sourcemaps
                },
                "processors": [
                    require('pixrem')(), // add fallbacks for rem units
                    require('autoprefixer')({browsers: 'last 4 versions'}) // add vendor prefixes
                   // require('cssnano')() // minify the result
                ]
            }*/

    } );

    // 3. aliases
    grunt.registerTask( "default", [
        "build",
        "analyse",
        "cowsay:done"
    ] );

    grunt.registerTask( "build", [ "sass:styles" ] );

    grunt.registerTask( "analyse", [ "eslint:scripts" ] );

    grunt.registerTask( "work", [
        "build",
      /*  "analyse",*/
        "browserSync",
        "watch"
    ] );
};
