<div class="p-4" x-data="{ position: false, category: false }" x-cloak>

    <div class="absolute flex items-center justify-center bg-opacity-40 bg-black w-full h-full top-0 left-0 z-20"
        x-show="position">
        <div class="md:w-[40%] w-[90%]  bg-[#202228] flex flex-col  border border-stone-600 rounded-lg">
            <div class="text-white p-3 flex justify-between items-center border-b orbit tracking-[2px] font-semibold">
                <div class="px-3">
                    Add New Category
                </div>
                <button @click="position = !position" class="text-red-800 orbit font-extrabold mr-2">
                    X
                </button>
            </div>
            <div x-data="sender()" class="h-full text-white w-full flex md:flex-row flex-col gap-x-3">
                <div class="w-full">
                    <form @submit.prevent="sendData"
                        class="flex flex-col justify-center py-10 px-20 w-full items-center h-full">
                        <!-- Input Name Position -->
                        <div class="mb-4 w-full">
                            <label for="position" class="block text-sm font-medium mb-2">Name Position</label>
                            <input type="text" id="position" x-model="form.position"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg p-3 text-white placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter your name position">
                        </div>

                        <div class="mb-4 w-full flex gap-x-4 justify-between">
                            <div>
                                <label for="latitude" class="block text-sm font-medium mb-2">Latitude</label>
                                <input type="text" id="latitude" x-model="form.latitude"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter latitude">
                            </div>
                            <div>
                                <label for="longitude" class="block text-sm font-medium mb-2">Longitude</label>
                                <input type="text" id="longitude" x-model="form.longitude"
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter longitude">
                            </div>
                        </div>

                        <!-- Input Picture -->
                        <div class="mb-4 w-full">
                            <label for="picture" class="block text-sm font-medium mb-2">Picture</label>
                            <input type="file" id="picture"
                                class="w-full bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500"
                                @change="handlePicture($event)">
                        </div>

                        <template x-if="form.preview">
                            <div class="mb-4 relative w-full overflow-hidden rounded-lg" style="padding-top: 56.25%;">
                                <!-- 16:9 Aspect Ratio -->
                                <img :src="form.preview" alt="Picture Preview"
                                    class="absolute top-0 left-0 w-full h-full object-cover max-w-full max-h-72">
                            </div>
                        </template>

                        <!-- Submit Button -->
                        <button type="submit" :disabled="loading"
                            class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg px-4 py-2">Save</button>
                    </form>
                </div>
            </div>



        </div>
    </div>

    <x-title name="Setting" logo="bi bi-clock" color="from-[#7ce7b0] to-[#07e916] from-10%" />
    <x-sub-nav>
        <div>
            <i class="bi bi-clock"></i>
        </div>
        <div class="text-white underline">
            Setting
        </div>

    </x-sub-nav>
    <div class="mt-4 flex px-4 gap-x-5">
        <div class="w-3/5 text-white">
            <div class="flex flex-col">
                <div class="flex w-full flex-row justify-between items-center">
                    <div class="flex items-center gap-x-2 text-lg font-mono">
                        <div>
                            <i class="bi bi-building"></i>
                        </div>
                        <div class="tracking-[1px]">
                            Position
                        </div>
                    </div>
                </div>
                <div class="w-full flex mt-2 justify-between">
                    <div>
                        <select wire:model.live='dropdowns'
                            class="block bg-gray-800 border p-2.5 border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-48 placeholder-gray-400">
                            <option value="" class="bg-gray-800">Select Data</option>
                            <option value="asas" class="bg-gray-800">asas Data</option>
                        </select>
                    </div>
                    <div>
                        <div class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400 dark:text-gray-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" wire:model="type_data"
                                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 placeholder-gray-400"
                                    placeholder="Search name..." wire:model="name" />
                            </div>
                            <button type="submit"
                                class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-600 rounded-lg border border-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-500 dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-900">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </button>
                            <button @click="position =! position"
                                class="p-2.5 ms-2 text-sm font-medium text-white bg-emerald-600 rounded-lg border border-emerald-600 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-emerald-500 dark:bg-emerald-700 dark:hover:bg-emerald-800 dark:focus:ring-emerald-900">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v14m7-7H5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <table class="min-w-full bg-slate-600 bg-opacity-30 rounded-lg shadow-lg">
                        <thead>
                            <tr>
                                <th
                                    class="py-3 justify-between flex px-6 bg-slate-700 text-left text-xs font-medium uppercase tracking-wider text-gray-400">
                                    <div class="flex justify-between w-full">
                                        <div>
                                            Nama
                                        </div>

                                    </div>
                                </th>
                                <th
                                    class="py-3 px-6 bg-slate-700 text-left text-xs font-medium uppercase tracking-wider text-gray-400">
                                    <div class="flex justify-between w-full">
                                        <div>
                                            Image
                                        </div>

                                    </div>
                                </th>
                                <th
                                    class="py-3 px-6 bg-slate-700 text-left text-xs font-medium uppercase tracking-wider text-gray-400">
                                    <div class="flex justify-between w-full">
                                        <div>
                                            Position
                                        </div>
                                        {{-- <div>
                                            <x-arrow value="subname" />
                                        </div> --}}
                                    </div>
                                </th>

                                <th
                                    class="py-3 px-6 bg-slate-700 text-left text-xs font-medium uppercase tracking-wider text-gray-400">
                                    <div class="flex justify-between w-full">
                                        <div>

                                        </div>
                                        {{-- <div>
                                            <x-arrow value="Timestamp" />
                                        </div> --}}
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-white">
                            @foreach ($dataSetting as $index => $logger)
                            <tr class="border-b border-gray-700">
                                <td class="py-2 px-4">{{ strtoupper($logger->position) }}</td>
                                <td class="py-2 px-4">{{ $logger->latitude }}</td>
                                <td class="py-2 px-4"><img class="h-16" src="{{$logger->image}}" alt=""></td>

                                <td class="py-2 px-4">{{ $logger->image }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('globalData', {
                counter: 0,
                message: 'Hello, Alpine!',
                increment() {
                    this.counter++;
                },
                reset() {
                    this.counter = 0;
                },
            });
        });

        function sender() {
            return {
                form: {
                    position: '',
                    latitude: '',
                    longitude: '',
                    picture: null,
                    preview: null
                },
                handlePicture(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.form.picture = file;
                        this.form.preview = URL.createObjectURL(file); // Membuat URL preview gambar
                    }
                },
                responMessage: '',
                loading: false,


                async sendData() {
                    this.loading = true;
                    this.responMessage = "";

                    try {
                        const csrf = document.querySelector('meta[name="csrf-token"]').content;
                        console.log(csrf);
                        const formData = new FormData();
                        formData.append('position', this.form.position);
                        formData.append('latitude', this.form.latitude);
                        formData.append('longitude', this.form.longitude);
                        if (this.form.picture) {
                            formData.append('image', this.form.picture);
                        }

                        const response = await fetch('/send/setting', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrf
                            },
                            body: formData, // Send the FormData directly
                        });

                        if (response.ok) {
                            const data = await response.json();
                            console.log("Saved data:", data);
                            this.responMessage = 'Data successfully sent!';
                        } else {
                            this.responMessage = response;
                        }
                    } catch (error) {
                        console.error('Error sending data:', error);
                        this.responMessage = 'An error occurred while sending the data.';
                    } finally {
                        this.loading = false;
                        console.log(this.responMessage);

                    }
                }


            }
        }


        function formHandler() {
            return {


            };
        }
    </script>
</div>