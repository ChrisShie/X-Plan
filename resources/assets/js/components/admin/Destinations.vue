<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <h1>Destinations</h1>
                <ol class="breadcrumb">
                    <li><a>Home</a></li>
                    <li class="active">Destinations</li>
                </ol>
                <button class="btn btn-border-cyan" @click="openAdd=true">Add Destination</button>
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
                        <tr v-for="(dest, index) in dests.slice((currentPage-1)*10, 10*currentPage)">
                            <td>{{(currentPage-1)*10+index+1}}</td>
                            <td>{{dest.id|leadZero}}</td>
                            <td>{{dest.name}}</td>
                            <td>{{dest.description|truncate(100)}}</td>
                            <td>{{dest.name}}</td>
                            <td>{{dest.name}}</td>
                            <td>{{dest.name}}</td>
                            <td>{{dest.name}}</td>
                            <td>
                                <button class="btn btn-cyan icon" @click="openEditDest(dest.id)"><span class="glyphicon glyphicon-pencil"></span></button>
                                <button class="btn btn-orangered icon" @click="openDeleteDest(dest.id)"><span class="glyphicon glyphicon-remove"></span></button>
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
        <uiv-modal v-model="openAdd" title="Add New Destination" ref="modal" id="modal-add" :footer="false" @hide="reset">
            <form @submit.prevent="addDest" class="add-item">
                <div class="form-group upload-image">
                    <div class="img-wrap" :style="{ backgroundImage: 'url(' +dest.thumbnail.url + ')' }">
                    </div>
                    <label for="thumbnail" v-if="!dest.thumbnail.modif" class="link orangered">Upload Image
                        <input type="file" @change="onFileChange" name="thumbnail" id="thumbnail">
                    </label>
                    <a v-else="dest.thumbnail.modif" @click="removeImage" class="link orangered">Remove Image</a>
                </div>
                <div class="form-group">
                    <label for="name">Destination Name</label>
                    <input type="text" name="name" id="name" class="form-control" v-model="dest.name" placeholder="Enter Destination Name Here">
                </div>
                <div class="form-group">
                    <label for="description">Destination Description</label>
                    <textarea name="description" class="form-control" id="description" v-model="dest.description" rows="5" placeholder="Enter Destination Description Here"></textarea>
                </div>
                <div class="form-group">
                    <label for="slide">Select Sliding Images</label>
                    <div v-for="(slide,index) in dest.slides" class="upload-image upload-slide">
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
        <uiv-modal v-model="openEdit" title="Edit Destination" ref="modal" id="modal-edit" :footer="false" @hide="reset">
            <form @submit.prevent="editDest(dest.id)" class="edit-item" enctype="multipart/form-data">
                <div class="form-group upload-image">
                    <div class="img-wrap" :style="{ backgroundImage: 'url(' +dest.thumbnail.url + ')' }">
                    </div>
                    <label for="thumbnail" v-if="!dest.thumbnail.modif" class="link orangered">Upload Image
                        <input type="file" @change="onFileChange" name="thumbnail" id="thumbnail">
                    </label>
                    <a v-else="dest.thumbnail.modif" @click="removeImage" class="link orangered">Remove Image</a>
                </div>
                <div class="form-group">
                    <label for="name">Destination Name</label>
                    <input type="text" name="name" id="name" class="form-control" v-model="dest.name" placeholder="Enter Destination Name Here">
                </div>
                <div class="form-group">
                    <label for="description">Destination Description</label>
                    <textarea name="description" class="form-control" id="description" v-model="dest.description" rows="5" placeholder="Enter Destination Description Here"></textarea>
                </div>
                <div class="form-group">
                    <label for="slide">Select Sliding Images</label>
                    <div v-for="(slide,index) in dest.slides" class="upload-image upload-slide">
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
        <uiv-modal v-model="openDelete" title="Delete Destination Confirmation" ref="modal" id="modal-delete" :footer="false" >
            <form @submit.prevent="deleteDest(deleteID)" class="delete-item">
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
        this.getAllDest();
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
        getAllDest(){
            axios.get('/destination').then(response => {
                console.log(response.data)
                this.dests = response.data.destinations;
                this.totalPage = Math.ceil(this.dests.length/10);
            });
        },
        openEditDest(id){
            var vm=this;
            this.openEdit = true;
            
            axios.get('/destination/'+id+"/edit").then(response => {
                var tmpDest = response.data.destination;
                
                this.dest ={
                    id:tmpDest.id,
                    name:tmpDest.name,
                    description: tmpDest.description,
                    thumbnail:{
                        modif:!(tmpDest.thumbnail===null),
                        url:(tmpDest.thumbnail===null?this.dest.thumbnail.url:axios.get('/destination/'+id+"/getThumbnail").then(response => {this.dest.thumbnail.url=response.data.path;}))
                    },
                    slides:[]
                }
                if(tmpDest.image1!==null){
                    axios.get('/destination/'+id+"/getSlides").then(response => {
                        response.data.slides.forEach(function(value) {
                            vm.dest.slides.push({
                                modif:true,
                                url:value
                            })
                        });  
                    })
                }else{
                    vm.dest.slides.push({
                        new:true,
                        modif:false,
                        url:'./images/slide_default.png'
                    })
                }
            });
        },
        openDeleteDest(id){
            this.openDelete = true;
            this.deleteID = id;
        },
        addDest () {
            var vm = this;
            this.slideFiles.forEach(function(value,index) {
                vm.slidesFormData.append("slide"+(index+1),value);
            });            
            axios.post('/destination', {
                name: this.dest.name,
                description: this.dest.description,
            }).then(response => {
                if(this.thumbnailFormData.has('thumbnail')){
                    axios.post('/destination/'+response.data.dest.id+"/uploadThumbnail",  this.thumbnailFormData)
                        .then(response => {
                            console.log("uploaded");
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
                if(this.slidesFormData.has('slide1')){
                    axios.post('/destination/'+response.data.dest.id+"/uploadSlides",  vm.slidesFormData)
                        .then(response => {
                            console.log("slide uploaded");
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
                this.open= false;
                this.reset();
                this.getAllDest();
                })
                .catch(error => {
                    console.log(error);
                });
        },
        editDest(id){
            var vm = this;
            this.slideFiles.forEach(function(value,index) {
                vm.slidesFormData.append("slide"+(index+1),value);
            });          
            var data = {
                name: this.dest.name,
                description: this.dest.description,
            }
            axios.put('/destination/'+id,data).then(response => {
                if(this.thumbnailFormData.has('thumbnail')){
                axios.post('/dest/'+id+"/uploadThumbnail",  this.thumbnailFormData)
                    .then(response => {
                        console.log("uploaded");
                    })
                    .catch(error => {
                        console.log(error);
                    });
                }
                if(this.slidesFormData.has('slide1')||this.slidesFormData.has('slide2')||this.slidesFormData.has('slide3')){
                    axios.post('/destination/'+id+"/uploadSlides",  vm.slidesFormData)
                        .then(response => {
                            console.log("slide uploaded");
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
                this.openEdit = false;
                this.reset();
                this.getAllDest();
            })
            .catch(error => {
                console.log(error);
            });
        },
        deleteDest(id){
            axios.delete('/destination/'+id).then(response => {
                this.openDelete=false;
                this.deleteID = undefined;
                this.getAllDest();
            })
            .catch(error => {
                console.log(error);
            });
        },
        addSlideImage(){
            if(this.dest.slides.length<3){
                this.$set(this.dest.slides, this.dest.slides.length, {url:'./images/slide_default.png',modif:false,new:true});
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
                vm.dest.thumbnail.url = e.target.result;
                vm.dest.thumbnail.modif=true;
            };
            reader.readAsDataURL(file);
            this.thumbnailFormData.append("thumbnail",e.target.files[0]);
        },
        removeImage(e) {
            this.dest.thumbnail.url = './images/thumbnail_default.png';
            this.dest.thumbnail.modif=false;
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
                vm.dest.slides[index].url= e.target.result;
                vm.dest.slides[index].modif=true;
            };
            reader.readAsDataURL(file);
            this.slideFiles[index]=e.target.files[0];
        },
        removeSlide(index,e) {
            if(this.dest.slides.length===1){
                this.dest.slides[0].url = './images/slide_default.png';
                this.dest.slides[0].modif=false;
                this.slideFiles=[];
            }else{
                this.dest.slides.splice(index, 1);
                this.slideFiles.splice(index, 1)
            }
        }
    }
  }
</script>