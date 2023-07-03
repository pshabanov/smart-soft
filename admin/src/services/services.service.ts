import ky from 'ky'
import {useUserStore} from '@/stores'
import type {ServicesRequestType} from '@/entities/news/news.model'

const BASE_URL = import.meta.env.VITE_BASE_URL

export const ServicesService = () => {

    const services = async (): Promise<{ data: ServicesRequestType[] }> => await ky('services', {
        prefixUrl: `${ BASE_URL }`,
        method: 'get',
        timeout: 60000,
    }).json()

    const servicesById = async (id: number): Promise<{ data: ServicesRequestType }> => await ky(`services/${ id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'get',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${ useUserStore().token }`,
        },
        timeout: 60000,
    }).json()

    const createServices = async (data: ServicesRequestType, files: Blob[]): Promise<ServicesRequestType> => {
        const formData = new FormData()
        formData.append('title', data.title)
        formData.append('description', data.description)
        formData.append('short_description', data.short_description)
        formData.append('price', data.price|| '')
        formData.append('image', data.image)
        formData.append('active', String(data.active))
        if (files.length){
            formData.append('files', files[0])
        }
        return await ky(`services`, {
            prefixUrl: `${ BASE_URL }`,
            method: 'post',
            headers: {
                'Authorization': `Bearer ${ useUserStore().token }`,
            },
            body: formData,
            timeout: 60000,
        }).json()
    }

    const updateServices = async (data: ServicesRequestType): Promise<{data: ServicesRequestType}> => {

        return await ky(`services/${ data.id }`, {
            prefixUrl: `${ BASE_URL }`,
            method: 'put',
            headers: {
                'Authorization': `Bearer ${ useUserStore().token }`,
            },
            json: data,
            timeout: 60000,
        }).json()
    }

    const servicesDelete = async (id: number): Promise<number | null> => await ky(`services/${ id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'delete',
        timeout: 60000,
    }).json()

    return {
        services,
        servicesById,
        servicesDelete,
        createServices,
        updateServices,
    }
}
