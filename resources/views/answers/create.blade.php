<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        <div class='flex items-center '>
                            <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                                <div class='max-w-md mx-auto space-y-6'>

                                    <form action="{{route('answers.store',['application'=>$application->id])}}" method="POST" >
                                        @csrf
                                        <h2 class="text-2xl font-bold ">Answer application #{{$application->id}}</h2>
                                        <hr class="my-6">
                                        <label class="uppercase text-sm font-bold opacity-70">Answer</label>
                                        <textarea rows="5" required  name="body" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none" ></textarea>
                                        <input type="submit" class="py-3 mr-4  px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-green-500 cursor-pointer ease-in-out duration-300" value="Submit">
                                        <a href="{{route('dashboard')}}"
                                            class="middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 my-2 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            data-ripple-light="true">
                                            Canel
                                        </a>
                                    </form>

                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

