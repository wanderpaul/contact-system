<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Contacts") }}
                </div>
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_contacts as $contact)
                           <tr>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->company}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->email}}</td>
                                <td>
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <form action="{{route('contact.destroy', ['id' => $contact->id])}}" method="post">
                                                <a class="btn btn-primary" href="" role="button">Edit</a>
                                            </form>
                                        </div>
                                        <div class="col-auto">
                                            <form action="{{route('contact.destroy', ['id' => $contact->id])}}" method="post">
                                            <x-danger-button
                                                    x-data=""
                                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                                                >{{ __('Delete') }}</x-danger-button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                           </tr> 
                        @endforeach
                    </tbody>
                   
                </table>
                
            </div>
        </div>
    </div>
</x-app-layout>
