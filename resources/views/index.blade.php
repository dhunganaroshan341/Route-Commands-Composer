<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Artisan Command Runner</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: '#FF2D20',
                    }
                }
            }
        }
    </script>
</head>

<body 
    class="min-h-screen bg-cover bg-center bg-fixed"
    style="background-image: url('https://images.unsplash.com/photo-1781591272000-f7f4f0c386b0?q=80&w=1175&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"
>

<div class="min-h-screen bg-black/70 flex items-center justify-center px-4 py-10">


    <div class="
        w-full 
        max-w-2xl
        backdrop-blur-xl
        bg-white/10
        border
        border-white/20
        rounded-3xl
        shadow-2xl
        p-6
        sm:p-10
    ">


        <!-- Header -->
        <div class="text-center mb-8">

            <div class="
                mx-auto
                w-16
                h-16
                rounded-2xl
                bg-laravel
                flex
                items-center
                justify-center
                shadow-lg
                shadow-red-500/30
                mb-5
            ">
                <span class="text-white text-3xl font-bold">
                    ⚡
                </span>
            </div>


            <h1 class="
                text-3xl
                sm:text-4xl
                font-bold
                text-white
            ">
                Artisan Command Runner
            </h1>


            <p class="
                text-gray-300
                mt-3
                text-sm
                sm:text-base
            ">
                Execute Laravel Artisan commands from your browser
            </p>

        </div>



        <!-- Form -->
        <form id="commandForm" class="space-y-6">


            <!-- Command -->
            <div>

                <label class="
                    block
                    text-sm
                    font-medium
                    text-gray-200
                    mb-2
                ">
                    Command
                </label>


                <input
                    type="text"
                    name="command"
                    placeholder="make:model"
                    required
                    class="
                        w-full
                        rounded-xl
                        bg-white/10
                        border
                        border-white/20
                        text-white
                        placeholder-gray-400
                        px-4
                        py-3
                        outline-none
                        focus:ring-2
                        focus:ring-laravel
                    "
                >

            </div>



            <!-- Options -->
            <div>

                <label class="
                    block
                    text-sm
                    font-medium
                    text-gray-200
                    mb-2
                ">
                    Options (JSON)
                </label>


                <textarea
                    name="options"
                    rows="5"
                    placeholder='{"name":"Post"}'
                    class="
                        w-full
                        rounded-xl
                        bg-white/10
                        border
                        border-white/20
                        text-white
                        placeholder-gray-400
                        px-4
                        py-3
                        outline-none
                        font-mono
                        text-sm
                        focus:ring-2
                        focus:ring-laravel
                    "
                ></textarea>


            </div>



            <!-- Button -->
            <button
                type="submit"
                id="runButton"
                class="
                    w-full
                    bg-laravel
                    hover:bg-red-600
                    text-white
                    font-semibold
                    py-3
                    rounded-xl
                    transition
                    duration-300
                    shadow-lg
                    shadow-red-500/30
                "
            >
                Run Command
            </button>


        </form>



        <!-- Output -->

        <div class="mt-8">


            <h3 class="
                text-white
                font-semibold
                mb-3
            ">
                Output
            </h3>


            <pre
                id="output"
                class="
                    bg-black/40
                    border
                    border-white/10
                    rounded-xl
                    p-4
                    text-sm
                    text-green-300
                    overflow-x-auto
                    min-h-24
                    whitespace-pre-wrap
                "
            >Waiting...</pre>


        </div>


    </div>

</div>



<script>

document
.getElementById('commandForm')
.addEventListener('submit', async function(e){

    e.preventDefault();


    const button = document.getElementById('runButton');
    const output = document.getElementById('output');


    button.disabled = true;
    button.innerText = "Running...";


    output.innerText = "Executing artisan command...";


    try {

        const formData = new FormData(this);


        const response = await fetch('/route-commands/run', {

            method:'POST',

            headers:{
                'X-CSRF-TOKEN':'{{ csrf_token() }}'
            },

            body:formData

        });



        const data = await response.json();


        output.classList.remove(
            'text-red-400'
        );


        output.classList.add(
            'text-green-300'
        );


        output.innerText = data.output ?? JSON.stringify(data,null,2);



    } catch(error){


        output.classList.remove(
            'text-green-300'
        );


        output.classList.add(
            'text-red-400'
        );


        output.innerText = error.message;


    }


    button.disabled=false;
    button.innerText="Run Command";


});

</script>


</body>
</html>