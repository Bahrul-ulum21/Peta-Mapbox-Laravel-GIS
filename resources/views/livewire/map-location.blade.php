<div class="main-panel">
    <div class="content">
        <div div class="page-inner">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <marquee class="card-header bg-light" behavior="scroll" direction="left"
                            style="white-space: nowrap;">
                            Selamat datang di aplikasi pemetaan kami!
                            Jelajahi dunia dengan penuh keajaiban dan temukan tempat-tempat menakjubkan di sekitarmu.
                            Dengan aplikasi ini, kamu dapat memetakan dan menjelajahi lokasi dengan mudah dan cepat.
                            Mari bersama-sama memulai petualanganmu dan temukan keindahan di setiap sudut dunia.
                            Selamat menggunakan aplikasi pemetaan kami, semoga pengalamanmu menyenangkan dan bermanfaat!
                        </marquee>
                        <div class="card-body">
                            <div wire:ignore id='map' style='width: 100%; height: 75vh;'></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <marquee class="card-header bg-light" behavior="scroll" direction="left"
                            style="white-space: nowrap;">
                            Silahkan klik pilih lokasi yang ingin anda tandai pada maps, dan input data pada form
                            berikut :
                        </marquee>
                        <div class="card-body">
                            <form 
                            @if ($isEdit)
                            wire:submit.prevent="updateLocation"  
                            @else
                            wire:submit.prevent="saveLocation"
                            @endif>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="longitude">Longitude</label>
                                            <input wire:model="long" type="text" id="longitude" name="longitude"
                                                class="form-control">
                                            @error('long')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="latitude">Latitude</label>
                                            <input wire:model="lat" type="text" id="latitude" name="latitude"
                                                class="form-control">
                                            @error('lat')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input wire:model="title" type="text" class="form-control">
                                    @error('title')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Description</label>
                                    <textarea wire:model="description" class="form-control"></textarea>
                                    @error('description')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Picture</label>
                                    <div class="custom-file">
                                        <input wire:model="image" id="image" type="file" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                        @error('image')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                    @if ($image)
                                    <img src="{{$image->temporaryUrl()}}" class="img-fluid">
                                    @endif
                                    @if ($imageUrl && !$image)
                                    <img src="{{asset('/storage/images/'. $imageUrl)}}" class="img-fluid">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark text-white btn-block">{{$isEdit ? "update Location" : "Submit Location" }}</button>
                                    @if ($isEdit) 
                                    <button wire:click="deletLocation" type="button" class="btn btn-danger text-white btn-block">Delet Location</button>
                                    @endif

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('livewire:load', () => {
        const defaultlocation = [113.67175256703996,-7.063028071797916];
        mapboxgl.accessToken ='pk.eyJ1IjoidWx1bSIsImEiOiJjbGkzN211Y3gwZDFhM2xtdnlseW9oYzNhIn0.m2HmymdDrq8SW4l3PNPDfg';
        var map = new mapboxgl.Map({
            container: 'map',
            center: defaultlocation,
            zoom: 11.15,
            style: 'mapbox://styles/mapbox/satellite-streets-v12'
        });
        const loadLocations = (geoJson) => {
            geoJson.features.forEach((location) => {
                const {
                    geometry,
                    properties
                } = location
                const {
                    iconSize,
                    locationId,
                    title,
                    image,
                    description
                } = properties

                let markerElement = document.createElement('div')
                markerElement.className = 'marker' + locationId
                markerElement.id = locationId
                markerElement.style.backgroundImage = "url(https://icon-library.com/images/google-map-pin-icon-png/google-map-pin-icon-png-4.jpg)"
                markerElement.style.backgroundSize = '100% 100%';
                markerElement.style.width = '30px'
                markerElement.style.height = '30px'
                markerElement.style.boxShadow = '0px 0px 10px 5px rgba(0, 0, 0, 0.3)';
                const imageStorage = '{{asset("/storage/images")}}' + '/' + image
                const content = `
                    <div style="overflow-y, auto;max-heigth:400px,width:100px">
                        <table>
                                <tbody>
                                    <tr>
                                        <td>Title :</td>
                                        <td>${title}</td>
                                    </tr>
                                    <tr>
                                        <td>Picture</td>
                                        <td><img src="${imageStorage}" loading="lazy" class="img-fluid"></td>
                                    </tr>
                                    <tr>
                                        <td>description</td>
                                        <td>${description}</td>
                                    </tr>
                                </tbody>
                        </table> 
                    </div>`

                markerElement.addEventListener('click', (e) => {
                    const locationId = e.target.id
                    @this.findLocationById(locationId)
                })

                const popUp = new mapboxgl.Popup({
                    offset: 25
                }).setHTML(content).setMaxWidth("400px")

                new mapboxgl.Marker(markerElement)
                    .setLngLat(geometry.coordinates)
                    .setPopup(popUp)
                    .addTo(map)
            })
        }
        loadLocations({!!$geoJson!!});

        window.addEventListener('locationAdded', (e) => {
            loadLocations(JSON.parse(e.detail))
        });

        window.addEventListener('updateLocation ', (e) => {
            loadLocations(JSON.parse(e.detail))
            $('.mapboxgl-popup').remove()
        });
        window.addEventListener('deletLocation', (e) => {
            $('.marker' + e.detail).remove()
            $('.mapboxgl-popup').remove()
        });

        map.addControl(new mapboxgl.NavigationControl());
        map.on('click', (e) => {
            const longtitude = e.lngLat.lng;
            const lattitude = e.lngLat.lat;
            @this.long = longtitude
            @this.lat = lattitude
        });
    });
</script>
@endpush
