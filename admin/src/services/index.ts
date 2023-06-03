import { api } from '@/utils'
import type { UserInfoType } from '@/entities/user/user.model'

export const UserService = () => {
    const login = (data: any) => api<UserInfoType>({
        url: 'login', method: 'post', json: data,
    })

    const getUsers = () => api<UserInfoType[]>({
        url: 'users/read',
    })

    return {
        login,
        getUsers
    }
}
