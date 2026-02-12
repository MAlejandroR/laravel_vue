import ProfileController from './ProfileController'
import ProjectController from './ProjectController'
import Auth from './Auth'

const Controllers = {
    ProfileController: Object.assign(ProfileController, ProfileController),
    ProjectController: Object.assign(ProjectController, ProjectController),
    Auth: Object.assign(Auth, Auth),
}

export default Controllers