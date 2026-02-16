export default {
    'name':'Profesores',
    'routes':{
        index:()=>route("teacher.index"),
        create:()=>route("teacher.create"),
        store:()=>route("teacher.create"),
        edit:(id)=>route("teacher.create",id),
        update:(id)=>route("teacher.update",id),
        delete:(id)=>route("teacher.delete",id),
    }
}