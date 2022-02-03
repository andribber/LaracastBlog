<x-layout>
    <section class="px-6 py-6" >
        <h1>All Users</h1>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">

                      @foreach ($users as $user)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="ml-4">
                                <a href="/post/{{$user->id}}">
                                    <div class="text-sm font-medium text-gray-900">
                                    {{$user->name}}
                                    </div>
                                </a>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                  <a href="/post/{{$user->id}}">
                                      <div class="text-sm font-medium text-gray-900">
                                      {{$user->username}}
                                      </div>
                                  </a>
                              </div>
                            </div>
                          </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Created {{$user->created_at->diffForHumans()}}
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="/admin/users/{{$user->id}}/edit" class="text-blue-500 hover:text-blue-700">Edit</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <form method="POST" action="/admin/users/{{$user->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="bg-blue-500 ml-3 mr-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:bg-blue-700">Delete</button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </section>




</x-layout>
