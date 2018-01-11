<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <h1>Destinations</h1>
                <ol class="breadcrumb">
                    <li><a>Home</a></li>
                    <li class="active">Destinations</li>
                </ol>
                <button class="btn btn-border-cyan" @click="open=true">Add Destination</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>City</th>
                            <th>Open Type</th>
                            <th>Scheduled</th>
                            <th>Rate</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(city, index) in cities.slice((currentPage-1)*10, 10*currentPage)">
                            <td>{{(currentPage-1)*10+index+1}}</td>
                            <td>{{city.id|leadZero}}</td>
                            <td>{{city.name}}</td>
                            <td>{{city.description|truncate(100)}}</td>
                            <td>{{city.name}}</td>
                            <td>{{city.name}}</td>
                            <td>{{city.name}}</td>
                            <td>{{city.name}}</td>
                            <td>
                                <button class="btn btn-cyan icon" @click="openEditCity(city.id)"><span class="glyphicon glyphicon-pencil"></span></button>
                                <button class="btn btn-orangered icon" @click="openDeleteCity(city.id)"><span class="glyphicon glyphicon-remove"></span></button>
                            </td>
                        </tr>
                    </tbody>
                 </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <uiv-pagination class="pull-right" v-model="currentPage" :total-page="totalPage" />
            </div>
        </div>
        <uiv-modal v-model="openAdd" title="Add New City" ref="modal" id="modal-add" :footer="false" @hide="reset">
            <form @submit.prevent="addCity" class="add-item">
                <div class="form-group upload-image">
                    <div class="img-wrap" :style="{ backgroundImage: 'url(' +city.thumbnail.url + ')' }">
                    </div>
                    <label for="thumbnail" v-if="!city.thumbnail.modif" class="link orangered">Upload Image
                        <input type="file" @change="onFileChange" name="thumbnail" id="thumbnail">
                    </label>
                    <a v-else="city.thumbnail.modif" @click="removeImage" class="link orangered">Remove Image</a>
                </div>
                <div class="form-group">
                    <label for="name">City Name</label>
                    <input type="text" name="name" id="name" class="form-control" v-model="city.name" placeholder="Enter City Name Here">
                </div>
                <div class="form-group">
                    <label for="description">City Description</label>
                    <textarea name="description" class="form-control" id="description" v-model="city.description" rows="5" placeholder="Enter City Description Here"></textarea>
                </div>
                <div class="form-group">
                    <label for="slide">Select Sliding Images</label>
                    <div v-for="(slide,index) in city.slides" class="upload-image upload-slide">
                        <div class="img-wrap" :style="{ backgroundImage: 'url(' +slide.url + ')' }">
                        </div>
                        <label :for="'slides'+index" v-if="!slide.modif" class="link orangered">Upload Image
                            <input type="file" @change="onSlideChange(index,$event)" :name="'slides'+index" :id="'slides'+index">
                        </label>
                        <a v-else="slide.modif" @click="removeSlide(index,$event)" class="link orangered">Remove Image</a>
                    </div>
                    <button type="button" class="btn btn-border-cyan" @click="addSlideImage">Add Slide Image</button>
                </div>
                <hr> 
                <div class="footer">
                    <button type="button" class="btn btn-default" @click="openAdd=false">Cancel</button>
                    <button type="submit" class="btn btn-border-orangered">Save</button>
                </div>
            </form>
        </uiv-modal>
        <uiv-modal v-model="openEdit" title="Edit City" ref="modal" id="modal-edit" :footer="false" @hide="reset">
            <form @submit.prevent="editCity(city.id)" class="edit-item" enctype="multipart/form-data">
                <div class="form-group upload-image">
                    <div class="img-wrap" :style="{ backgroundImage: 'url(' +city.thumbnail.url + ')' }">
                    </div>
                    <label for="thumbnail" v-if="!city.thumbnail.modif" class="link orangered">Upload Image
                        <input type="file" @change="onFileChange" name="thumbnail" id="thumbnail">
                    </label>
                    <a v-else="city.thumbnail.modif" @click="removeImage" class="link orangered">Remove Image</a>
                </div>
                <div class="form-group">
                    <label for="name">City Name</label>
                    <input type="text" name="name" id="name" class="form-control" v-model="city.name" placeholder="Enter City Name Here">
                </div>
                <div class="form-group">
                    <label for="description">City Description</label>
                    <textarea name="description" class="form-control" id="description" v-model="city.description" rows="5" placeholder="Enter City Description Here"></textarea>
                </div>
                <div class="form-group">
                    <label for="slide">Select Sliding Images</label>
                    <div v-for="(slide,index) in city.slides" class="upload-image upload-slide">
                        <div class="img-wrap" :style="{ backgroundImage: 'url(' +slide.url + ')' }">
                        </div>
                        <label :for="'slides'+index" v-if="!slide.modif||!slide.new" class="link orangered">
                            <span v-if="!slide.modif&&slide.new">Upload Image</span>
                            <span v-else>Change Image</span>
                            <input type="file" @change="onSlideChange(index,$event)" :name="'slides'+index" :id="'slides'+index">
                        </label>
                        <a v-else-if="slide.modif&&slide.new" @click="removeSlide(index,$event)" class="link orangered">Remove Image</a>
                    </div>
                    <button type="button" class="btn btn-border-cyan" @click="addSlideImage">Add Slide Image</button>
                </div>
                <hr> 
                <div class="footer">
                    <button type="button" class="btn btn-default" @click="openEdit=false">Cancel</button>
                    <button type="submit" class="btn btn-border-orangered">Save</button>
                </div>
            </form>
        </uiv-modal>
        <uiv-modal v-model="openDelete" title="Delete City Confirmation" ref="modal" id="modal-delete" :footer="false" >
            <form @submit.prevent="deleteCity(deleteID)" class="delete-item">
                <h4>Are you sure to delete this record ?</h4>
                <hr> 
                <div class="footer">
                    <button type="button" class="btn btn-default" @click="openDelete=false">No</button>
                    <button type="submit" class="btn btn-border-orangered">Yes</button>
                </div>
            </form>
        </uiv-modal>
    </div>
</template>
<script>
  export default {
    data () {
      return {
        openAdd: false,
        openEdit:false,
        openDelete:false,
        deleteID:undefined,
        totalPage: 1,
        currentPage: 1,
        dests:[],
        dest:{
            thumbnail:{
                modif:false,
                url:'./images/thumbnail_default.png'
            },
            slides:[
                {
                    new:true,
                    modif:false,
                    url:'./images/slide_default.png'
                }
            ]
        },
        slideFiles:[],
        thumbnailFormData: new FormData(),
        slidesFormData: new FormData(),
      }
    },
    mounted()
    {
        this.getAllCities();
    },
    methods: {
        reset(){
            this.dest={
                thumbnail:{
                    modif:false,
                    url:'./images/thumbnail_default.png'
                },
                slides:[
                    {
                        modif:false,
                        url:'./images/slide_default.png'
                    }
                ]
            };
            this.slideFiles=[];
            this.thumbnailFormData= new FormData();
            this.slidesFormData= new FormData();
        },
        getAllCities(){
            axios.get('/destination').then(response => {
                this.dests = response.data.destinations;
                this.totalPage = Math.ceil(this.dests.length/10);
            });
        },
        openEditCity(id){
            var vm=this;
            this.openEdit = true;
            
            axios.get('/city/'+id+"/edit").then(response => {
                var tmpCity = response.data.city;
                
                this.city ={
                    id:tmpCity.id,
                    name:tmpCity.name,
                    description: tmpCity.description,
                    thumbnail:{
                        modif:!(tmpCity.thumbnail===null),
                        url:(tmpCity.thumbnail===null?this.city.thumbnail.url:axios.get('/city/'+id+"/getThumbnail").then(response => {this.city.thumbnail.url=response.data.path;}))
                    },
                    slides:[]
                }
                if(tmpCity.image1!==null){
                    axios.get('/city/'+id+"/getSlides").then(response => {
                        response.data.slides.forEach(function(value) {
                            vm.city.slides.push({
                                modif:true,
                                url:value
                            })
                        });  
                    })
                }else{
                    vm.city.slides.push({
                        new:true,
                        modif:false,
                        url:'./images/slide_default.png'
                    })
                }
            });
        },
        openDeleteCity(id){
            this.openDelete = true;
            this.deleteID = id;
        },
        addCity () {
            var vm = this;
            this.slideFiles.forEach(function(value,index) {
                vm.slidesFormData.append("slide"+(index+1),value);
            });            
            axios.post('/city', {
                name: this.city.name,
                description: this.city.description,
            }).then(response => {
                if(this.thumbnailFormData.has('thumbnail')){
                    axios.post('/city/'+response.data.city.id+"/uploadThumbnail",  this.thumbnailFormData)
                        .then(response => {
                            console.log("uploaded");
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
                if(this.slidesFormData.has('slide1')){
                    axios.post('/city/'+response.data.city.id+"/uploadSlides",  vm.slidesFormData)
                        .then(response => {
                            console.log("slide uploaded");
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
                this.open= false;
                this.reset();
                this.getAllCities();
                })
                .catch(error => {
                    console.log(error);
                });
        },
        editCity(id){
            var vm = this;
            this.slideFiles.forEach(function(value,index) {
                vm.slidesFormData.append("slide"+(index+1),value);
            });          
            var data = {
                name: this.city.name,
                description: this.city.description,
            }
            axios.put('/city/'+id,data).then(response => {
                if(this.thumbnailFormData.has('thumbnail')){
                axios.post('/city/'+id+"/uploadThumbnail",  this.thumbnailFormData)
                    .then(response => {
                        console.log("uploaded");
                    })
                    .catch(error => {
                        console.log(error);
                    });
                }
                if(this.slidesFormData.has('slide1')||this.slidesFormData.has('slide2')||this.slidesFormData.has('slide3')){
                    axios.post('/city/'+id+"/uploadSlides",  vm.slidesFormData)
                        .then(response => {
                            console.log("slide uploaded");
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
                this.openEdit = false;
                this.reset();
                this.getAllCities();
            })
            .catch(error => {
                console.log(error);
            });
        },
        deleteCity(id){
            axios.delete('/city/'+id).then(response => {
                this.openDelete=false;
                this.deleteID = undefined;
                this.getAllCities();
            })
            .catch(error => {
                console.log(error);
            });
        },
        addSlideImage(){
            if(this.city.slides.length<3){
                this.$set(this.city.slides, this.city.slides.length, {url:'./images/slide_default.png',modif:false,new:true});
            }else{
                alert("Slide Images can't be more than 3");
            }
        },
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            var file = files[0];
            var image = new Image();
            var reader = new FileReader();
            var vm = this;
            reader.onload = (e) => {
                vm.city.thumbnail.url = e.target.result;
                vm.city.thumbnail.modif=true;
            };
            reader.readAsDataURL(file);
            this.thumbnailFormData.append("thumbnail",e.target.files[0]);
        },
        removeImage(e) {
            this.city.thumbnail.url = './images/thumbnail_default.png';
            this.city.thumbnail.modif=false;
            this.thumbnailFormData= new FormData()
        },
        onSlideChange(index,e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            var file = files[0];
            var image = new Image();
            var reader = new FileReader();
            var vm = this;
            reader.onload = (e) => {
                vm.city.slides[index].url= e.target.result;
                vm.city.slides[index].modif=true;
            };
            reader.readAsDataURL(file);
            this.slideFiles[index]=e.target.files[0];
        },
        removeSlide(index,e) {
            if(this.city.slides.length===1){
                this.city.slides[0].url = './images/slide_default.png';
                this.city.slides[0].modif=false;
                this.slideFiles=[];
            }else{
                this.city.slides.splice(index, 1);
                this.slideFiles.splice(index, 1)
            }
        }
    }
  }
</script>