module.exports = function(grunt) {
    //Initializing the configuration object
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        // Task configuration
        concat: {
            options: {
                separator: ';'
            },
            main: {
                src: ['./vendor/bower_components/jquery/dist/jquery.js', 
                      './vendor/bower_components/bootstrap/dist/js/bootstrap.js',                      
                      './vendor/bower_components/jquery-ui/jquery-ui.js',                      
                      './vendor/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js', 
                      './vendor/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js',
                      './vendor/bower_components/bootstrap-fileinput/js/fileinput.min.js',
                      './app/assets/js/jquery.slugger.js',
                      './app/assets/js/main.js',
                      './vendor/bower_components/jquery-ujs/src/rails.js', 
                      ],
                dest: './public/js/main.js'
            },
        },
        concat_css: {
            options: {},
            main: {
                src: ['./vendor/bower_components/bootstrap/dist/css/bootstrap.css',
                      './vendor/bower_components/jquery-ui/themes/smoothness/jquery-ui.css',                       
                      './vendor/bower_components/font-awesome/css/font-awesome.css', 
                      './vendor/bower_components/bootstrap-timepicker/css/bootstrap-timepicker.css',
                      './vendor/bower_components/bootstrap-datepicker/css/datepicker.css',
                      './vendor/bower_components/bootstrap-fileinput/css/fileinput.min.css',
                      './app/assets/css/main.css',
                      ],
                dest: './public/css/main.css'
            },
        },
        uglify: {
            options: {
                mangle: false // Use if you want the names of your functions and variables unchanged
            },
            main: {
                files: {
                    './public/js/main.min.js': './public/js/main.js'
                }
            },
        },
        cssmin: {
            main: {
                src: './public/css/main.css',
                dest: './public/css/main.min.css'
            }
        },
        copy: {
            main: {
                files: [
                    { src: './vendor/bower_components/font-awesome/fonts/**',
                      dest: './public/fonts/',
                      expand: true, flatten: true, filter: 'isFile' },
                    { src: './vendor/bower_components/bootstrap/dist/fonts/**',
                      dest: './public/fonts/',
                      expand: true, flatten: true, filter: 'isFile' },
                    { cwd: './vendor/bower_components/ckeditor/',
                      src: ['**'],
                      dest: './public/js/ckeditor/',
                      expand: true }
                ]
            }
        }
    });
    // Plugin loading
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-concat-css');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.registerTask('default', ['concat', 'concat_css', 'uglify', 'cssmin', 'copy']);
};