<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        


        <title>Laravel</title>          
        
        <!-- Styles -->
        <style>
            
           
        </style>
    </head>
    <body >
        <div class="max-w-lg mx-auto">
            <div class="bg-blue-100 border-t-4 border-blue-500 rounded-b px-4 py-3 shadow-md my-4">
                <div class="flex items-center">
                    <div class="text-blue-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="mx-3">
                        <span class="font-semibold text-blue-700">Info alert!</span>
                        <p class="text-sm text-blue-700">Change a few things up and try submitting again.</p>
                    </div>
                </div>
            </div>
            <div class="bg-red-100 border-t-4 border-red-500 rounded-b px-4 py-3 shadow-md my-4">
                <div class="flex items-center">
                    <div class="text-red-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <div class="mx-3">
                        <span class="font-semibold text-red-700">Danger alert!</span>
                        <p class="text-sm text-red-700">Change a few things up and try submitting again.</p>
                    </div>
                </div>
            </div>
            <div class="bg-green-100 border-t-4 border-green-500 rounded-b px-4 py-3 shadow-md my-4">
                <div class="flex items-center">
                    <div class="text-green-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="mx-3">
                        <span class="font-semibold text-green-700">Success alert!</span>
                        <p class="text-sm text-green-700">Change a few things up and try submitting again.</p>
                    </div>
                </div>
            </div>
            <div class="bg-yellow-100 border-t-4 border-yellow-500 rounded-b px-4 py-3 shadow-md my-4">
                <div class="flex items-center">
                    <div class="text-yellow-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="mx-3">
                        <span class="font-semibold text-yellow-700">Warning alert!</span>
                        <p class="text-sm text-yellow-700">Change a few things up and try submitting again.</p>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
    
</html>



