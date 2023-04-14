<template>
  <div class="hello">
    <div class="container">
    <h3>Employee list</h3>
  <form @submit.prevent="importXlFile" >
    <div  class="row">
      <div class=" col-md-6" >
        <label for="file" class="form-group">Select XL File:</label>
        <input type="file" class="form-group" id="file" @change="attachFile" />
      </div>
      <div class="col-md-6" >
        <button type="submit" class="btn btn-sm btn-primary ">Import Xl file</button>

      </div>
    </div>
   </form>
   <br>
   <br>
 <div class="row">
  <div class="col-md-6">
    <div class="form-group">
        <label for="file">Enter employee id</label>
        <input type="text" v-model="searchByID" />
      </div>
  </div>
  <div class="col-md-6">
    <form @submit.prevent="generatePDF" >
    <div  class="row">
      <div class=" col-md-6" >
        <div class="form-group">
          <label for="in_time" >In time</label>
        <input type="time"  id="in_time" v-model="time.in_time" />
        </div>
        <div class="form-group">
          <label for="out_time" >Out time</label>
        <input type="time"  id="out_time" v-model="time.in_tout_timeime" />
        </div>
          
      </div>
      <div class="col-md-6" >
        <button type="submit" class="btn btn-sm btn-primary ">Generate PDF</button>

      </div>
    </div>
   </form>
  </div>
</div>
 
  </div>
  <br>
   <br>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Moth </th>
        <th>Date </th>
        <th>Day </th>
        <th>EmpId </th>
        <th>EmployeeName </th>
        <th>Department </th>
        <th>FirstInTime </th>
        <th>LastOutTime </th>
        <th>HoursOfWork </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item,index) in emp_list" :key="index">
        <td>{{ item.Month }}</td>
        <td>{{ item.Date }}</td>
        <td>{{ item.Day }}</td>
        <td>{{ item.EmpID }}</td>
        <td>{{ item.EmployeeName }}</td>
        <td>{{ item.Department }}</td>
        <td>{{ item.FirstInTime }}</td>
        <td>{{ item.LastOutTime }}</td>
        <td>{{ item.HoursOfWork }}</td>
       
      </tr>
      
    </tbody>
  </table>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'EmployeeList',
  props: {
    msg: String
  },
  data(){
    return{
      xl_file:"",
      base_url:'http://localhost:8000/api/',
      emp_list:[],
      searchByID:'',
      time:{
        in_time:'',
      out_time:''
      }
    }
  },
  mounted(){
    axios.get(this.base_url+'employee/index/')
  .then(response => {
    this.emp_list=response.data.data
    console.log('this.emp_list :>> ', this.emp_list);
  })
  .catch(error => {
    console.log(error);
  });
  },
  watch: {
    searchByID(new_value,old_value) {
      console.log('old_value :>> ', old_value);
      axios.get(this.base_url+`employee/index?emp_id=${new_value}`)
        .then(response => {
          this.emp_list = response.data.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
  },
  methods:{
    generatePDF() {
  axios.post(this.base_url+'employee/pdf/',this.time)
    .then(response => {
      const url = window.URL.createObjectURL(new Blob([response.data]));
      const link = document.createElement('a');
      link.href = url;
      link.setAttribute('download', 'emp_list.pdf');
      document.body.appendChild(link);
      link.click();
    })
    .catch(error => {
      console.log(error);
    });
},
    attachFile (e) {
      const xl_file = e.target.files[0]; // accessing file
      this.xl_file = xl_file
      console.log('attach file',this.xl_file)
    },

    importXlFile() {
    let formData = new FormData();
    formData.append('file', this.xl_file,);
    axios.post(this.base_url+'employee/import/', formData)
      .then(response => {
        console.log(response.data);
      })
      .catch(error => {
        console.log(error);
      });

    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
