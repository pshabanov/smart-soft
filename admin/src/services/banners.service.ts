import ky from 'ky'
import { useUserStore } from '@/stores'
import type { BannersRequestType } from '@/entities/news/news.model'

const BASE_URL = import.meta.env.VITE_BASE_URL

export const BannersService = () => {

    const banners = async (): Promise<{ data: BannersRequestType[] }> => await ky('banners', {
        prefixUrl: `${ BASE_URL }`,
        method: 'get',
        timeout: 60000,
    }).json()

    const bannersById = async (id: number): Promise<{ data: BannersRequestType }> => await ky(`banners/${ id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'get',
        headers: {
            'Accept': 'application/json',
        },
        timeout: 60000,
    }).json()

    const createBanners = async (data: BannersRequestType, files: Blob[]): Promise<BannersRequestType> => {
        const formData = new FormData()
        formData.append('title', data.title)
        formData.append('link', data.link)
        formData.append('gradient_start', data.gradient_start || '')
        formData.append('gradient_end', data.gradient_end || '')
        formData.append('active', String(data.active))
        if (files.length){
            formData.append('files', files[0])
        }
        return await ky(`banners`, {
            prefixUrl: `${ BASE_URL }`,
            method: 'post',
            headers: {
                'Authorization': `Bearer ${ useUserStore().token }`,
            },
            body: formData,
            timeout: 60000,
        }).json()
    }

    const updateBanners = async (data: BannersRequestType): Promise<{data: BannersRequestType}> => {

        return await ky(`banners/${ data.id }`, {
            prefixUrl: `${ BASE_URL }`,
            method: 'put',
            headers: {
                'Authorization': `Bearer ${ useUserStore().token }`,
            },
            json: data,
            timeout: 60000,
        }).json()
    }

    const bannersDelete = async (id: number): Promise<number | null> => await ky(`banners/${ id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'delete',
        timeout: 60000,
    }).json()

    return {
        banners,
        bannersById,
        bannersDelete,
        createBanners,
        updateBanners,
    }
}
