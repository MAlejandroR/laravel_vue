export default {
    'name':'Estudiantes',
    'routes':{
        index:()=>route("students.index"),
        create:()=>route("students.create"),
        store:()=>route("students.create"),
        edit:(id)=>route("students.create",id),
        update:(id)=>route("students.update",id),
        delete:(id)=>route("students.delete",id),
    }
}