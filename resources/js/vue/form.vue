<template>
       <div>

            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Client Form</h6>
                </div>
                <div class="card-body">

                      <div class="form-group">
                      <label for="exampleFormControlInput1">Name</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" v-model="client.name"
                        placeholder="Enter Your Name">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Gender</label>
                      <select class="form-control" id="exampleFormControlSelect1" v-model="client.gender">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlInput1">Phone</label>
                      <input type="number" class="form-control" id="" name="" min="0000000000" max="9999999999"
                        placeholder="Enter Your Number" v-model="client.phone">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlInput1">Email address</label>
                      <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="name@example.com" v-model="client.email">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlInput1">Address</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="Address" v-model="client.address">
                    </div>
                    
                    

                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Nationality</label>
                      <select class="form-control" id="exampleFormControlSelect2" v-model="client.nationality">
                        <option>Nepali</option>
                        <option>Indian</option>
                        <option>American</option>
                        <option>German</option>
                        <option>Canadian</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Date Of Birth</label>
                      <input type="date" class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="client.date_of_birth"/>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlInput1">Education Background</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="Your Education Backbround Here" v-model="client.education_background">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Preferred Mode Of Contact</label>
                      <select class="form-control" id="exampleFormControlSelect2" v-model="client.preferred_mode_of_contact">
                        <option>Email</option>
                        <option>Phone</option>                        
                      </select>
                    </div>
                    <button @click="addClient()" class="btn btn-primary">Submit</button>

                </div>
              </div>
                   </div>

</template>

<script>

export default {
    data:function(){
        return{
            client:{
                name:"",
                gender:"",
                phone:"",
                email:"",
                address:"",
                nationality:"",
                date_of_birth:"",
                education_background:"",
                preferred_mode_of_contact:"",
                
            }
        }
    },
    methods:{
        addClient(){

            axios.post('api/client/store',{
                client: this.client

            })
            .then(response =>{
                if(response.status == 200) // sucessful creation
                {

                
                window.location.href = "/download";
               
                }
            })
            .catch(error =>{
                console.log(error);
            })
        }
    }
   
}
</script>

