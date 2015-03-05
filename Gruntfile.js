module.exports = function(grunt) {
    //Initializing the configuration object
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        // Task configuration
        concat: {
            options: {
                separator: ';'
            },
            backend: {
                src: ['./vendor/bower_components/jquery/dist/jquery.js', 
                      './vendor/bower_components/bootstrap/dist/js/bootstrap.js',
                      './vendor/bower_components/jquery-ui/jquery-ui.js',
                      './vendor/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js', 
                      './vendor/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js',
                      
                      './app/assets/backend/js/metisMenu.js',
                      './app/assets/backend/js/sb-admin-2.js'
                      ],
                dest: './public/themes/admin/js/backend.js'
            },
            main: {
                src: ['./vendor/bower_components/jquery/dist/jquery.js', 
                      './vendor/bower_components/bootstrap/dist/js/bootstrap.js',
                      './vendor/bower_components/jquery-ui/jquery-ui.js',
                      './vendor/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js', 
                      './vendor/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js',
                      './vendor/bower_components/bootstrap-fileinput/js/fileinput.min.js',
                      './app/assets/frontend/js/jquery.slugger.js',
                      './app/assets/frontend/js/main.js',
                      './vendor/bower_components/jquery-ujs/src/rails.js', 
                      ],
                dest: './public/themes/frontend/js/main.js'
            },
        },
        concat_css: {
            options: {},
            backend: {
                src: ['./vendor/bower_components/bootstrap/dist/css/bootstrap.css',
                      './vendor/bower_components/jquery-ui/themes/smoothness/jquery-ui.css',
                      './vendor/bower_components/font-awesome/css/font-awesome.css', 
                      /*
                      './app/assets/admin/css/zabuto_calendar.css',
                      './app/assets/admin/css/jquery.gritter.css',
                      './app/assets/admin/css/lineicons/style.css',
                      */
                      './app/assets/backend/css/metisMenu.css',
                      './app/assets/backend/css/sb-admin-2.css',
                      ],
                dest: './public/themes/admin/css/backend.css'
            },
            main: {
                src: ['./vendor/bower_components/bootstrap/dist/css/bootstrap.css',
                      './vendor/bower_components/jquery-ui/themes/smoothness/jquery-ui.css',
                      './vendor/bower_components/font-awesome/css/font-awesome.css', 
                      './vendor/bower_components/bootstrap-timepicker/css/bootstrap-timepicker.css',
                      './vendor/bower_components/bootstrap-datepicker/css/datepicker.css',
                      './vendor/bower_components/bootstrap-fileinput/css/fileinput.min.css',
                      './app/assets/frontend/css/main.css',
                      ],
                dest: './public/themes/frontend/css/main.css'
            },
        },
        uglify: {
            options: {
                mangle: false // Use if you want the names of your functions and variables unchanged
            },
            backend: {
                files: {
                    './public/themes/admin/js/backend.min.js': './public/themes/admin/js/backend.js'
                }
            },
            main: {
                files: {
                    './public/themes/frontend/js/main.min.js': './public/themes/frontend/js/main.js'
                }
            },
        },
        cssmin: {
            backend: {
                src: './public/themes/admin/css/backend.css',
                dest: './public/themes/admin/css/backend.min.css'
            },
            main: {
                src: './public/themes/frontend/css/main.css',
                dest: './public/themes/frontend/css/main.min.css'
            }
        },
        copy: {
            backend: {
                files: [
                    { src: './vendor/bower_components/font-awesome/fonts/**',
                      dest: './public/themes/admin/fonts/',
                      expand: true, flatten: true, filter: 'isFile' },
                    { src: './vendor/bower_components/bootstrap/dist/fonts/**',
                      dest: './public/themes/admin/fonts/',
                      expand: true, flatten: true, filter: 'isFile' },
                    { cwd: './vendor/bower_components/ckeditor/',
                      src: ['**'],
                      dest: './public/themes/admin/js/ckeditor/',
                      expand: true },
                    { cwd: './app/assets/backend/img/',
                      src: ['**'],
                      dest: './public/themes/admin/img/',
                      expand: true }
                ]
            },
            main: {
                files: [
                    { src: './vendor/bower_components/font-awesome/fonts/**',
                      dest: './public/themes/frontend/fonts/',
                      expand: true, flatten: true, filter: 'isFile' },
                    { src: './vendor/bower_components/bootstrap/dist/fonts/**',
                      dest: './public/themes/frontend/fonts/',
                      expand: true, flatten: true, filter: 'isFile' },
                    { src: './app/assets/frontend/img/**',
                      dest: './public/themes/frontend/img/',
                      expand: true, flatten: true, filter: 'isFile' },
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