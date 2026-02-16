export default {
    'name':'Proyecto',
    'routes':{
        index:()=>route("projects.index"),
        create:()=>route("projects.create"),
        store:()=>route("projects.create"),
        edit:(id)=>route("projects.create",id),
        update:(id)=>route("projects.update",id),
        delete:(id)=>route("projects.delete",id),
    }
}