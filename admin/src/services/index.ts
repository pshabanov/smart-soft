import {api, token} from '@/utils'
import type {tokenType, UserInfoType} from '@/entities/user/user.model'
import ky from "ky";
import {useUserStore} from "@/stores";

const BASE_URL = import.meta.env.VITE_BASE_URL

export const UserService = () => {

    const login = async (data: any) => await ky('auth/login', {
        prefixUrl: `${ BASE_URL }`,
        method: 'post',
        searchParams: {...data},
        timeout: 60000,
    }).json()

    const checkToken = async () => await ky('auth/me', {
        prefixUrl: `${ BASE_URL }`,
        method: 'post',
        headers: {
            "Accept": "application/json",
            'Authorization': `Bearer ${useUserStore().token}`
        },
        timeout: 60000,
    }).json();

    const getUsers = () => api<UserInfoType[]>({
        url: 'users/read',
    })

    return {
        login,
        getUsers,
        checkToken
    }
}
