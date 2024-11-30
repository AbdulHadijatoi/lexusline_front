<div class="max-w-2xl mx-auto bg-white rounded-md px-4 py-2">
    <form action="{{ route('vesselSchedule') }}" method="GET">
        <div class="border-b mb-2">
            <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block text-sm text-gray-700 hover:text-gray-800 hover:border-blue-950 active:border-blue-950 active:text-blue-950 rounded-t-lg p-4 text-center border-transparent border-b-2 active"
                        id="schedule-tab" data-tabs-target="#schedule" type="button" role="tab" aria-controls="schedule" aria-selected="true">
                        Schedule
                    </button>
                </li>
            </ul>
        </div>

        <div id="myTabContent">
            <div class="px-4 py-2 rounded-lg" id="schedule" role="tabpanel" aria-labelledby="schedule-tab">
                <label for="origin" class="inline-block mb-2">From</label>
                <div class="relative w-full d-flex align-items-center mb-2">
                    <i class='bx bx-map-alt absolute inset-y-0 left-0 mt-4 pl-3 text-gray-400 text-md'></i>
                    <input id="origin" name="origin" placeholder="Origin" required type="text" 
                        class="w-full h-12 pl-10 pr-4 transition duration-200 bg-white border border-gray-300 rounded appearance-none focus:border-red-950 focus:outline-none focus:shadow-outline"
                        onkeyup="fetchPorts('origin')"/>
                    <ul id="origin-suggestions" class="absolute z-10 bg-white border border-gray-300 w-full hidden">
                        <!-- Suggestions will appear here -->
                    </ul>
                </div>
                
                <label for="destination" class="inline-block mb-2">To</label>
                <div class="relative w-full d-flex align-items-center mb-2">
                    <i class='bx bx-map absolute inset-y-0 left-0 mt-4 pl-3 text-gray-400 text-md'></i>
                    <input id="destination" name="destination" placeholder="Destination" required type="text" 
                        class="w-full h-12 pl-10 pr-4 transition duration-200 bg-white border border-gray-300 rounded appearance-none focus:border-red-950 focus:outline-none focus:shadow-outline"
                        onkeyup="fetchPorts('destination')"/>
                    <ul id="destination-suggestions" class="absolute z-10 bg-white border border-gray-300 w-full hidden">
                        <!-- Suggestions will appear here -->
                    </ul>
                </div>

                <button type="submit" class="inline-flex items-center justify-center h-10 px-6 font-medium tracking-wide transition duration-200 rounded bg-blue-950 hover:bg-blue-900 text-white">
                    Track
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    // Function to fetch ports based on input and show suggestions
    function fetchPorts(field) {
        const input = document.getElementById(field);
        const suggestionList = document.getElementById(`${field}-suggestions`);
        
        const query = input.value;
        
        if (query.length < 3) {
            suggestionList.classList.add('hidden');
            return;
        }

        fetch(`/ports/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                suggestionList.innerHTML = '';
                if (data.length > 0) {
                    suggestionList.classList.remove('hidden');
                    data.forEach(port => {
                        const listItem = document.createElement('li');
                        listItem.classList.add('px-4', 'py-2', 'cursor-pointer');
                        listItem.textContent = port.name;  // Assuming ports have a 'name' property
                        listItem.onclick = () => {
                            input.value = port.name;
                            suggestionList.classList.add('hidden');
                        };
                        suggestionList.appendChild(listItem);
                    });
                } else {
                    suggestionList.classList.add('hidden');
                }
            });
    }
</script>
