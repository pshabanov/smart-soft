import ky from 'ky'
import { useUserStore } from '@/stores'
import type { CertificatesRequestType} from '@/entities/news/news.model'

const BASE_URL = import.meta.env.VITE_BASE_URL

export const CertificatesService = () => {

    const certificates = async (): Promise<{ data: CertificatesRequestType[] }> => await ky('certificates', {
        prefixUrl: `${ BASE_URL }`,
        method: 'get',
        timeout: 60000,
    }).json()

    const certificatesById = async (id: number): Promise<{ data: CertificatesRequestType }> => await ky(`certificates/${ id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'get',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${ useUserStore().token }`,
        },
        timeout: 60000,
    }).json()

    const createCertificates = async (data: CertificatesRequestType, files: Blob[]): Promise<CertificatesRequestType> => {
        const formData = new FormData()
        formData.append('title', data.title)
        formData.append('image', data.image)
        formData.append('active', String(data.active))
        if (files.length){
            formData.append('files', files[0])
        }
        return await ky(`certificates`, {
            prefixUrl: `${ BASE_URL }`,
            method: 'post',
            headers: {
                'Authorization': `Bearer ${ useUserStore().token }`,
            },
            body: formData,
            timeout: 60000,
        }).json()
    }

    const updateCertificates = async (data: CertificatesRequestType): Promise<{data: CertificatesRequestType}> => {

        return await ky(`certificates/${ data.id }`, {
            prefixUrl: `${ BASE_URL }`,
            method: 'put',
            headers: {
                'Authorization': `Bearer ${ useUserStore().token }`,
            },
            json: data,
            timeout: 60000,
        }).json()
    }

    const certificatesDelete = async (id: number): Promise<number | null> => await ky(`certificates/${ id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'delete',
        timeout: 60000,
    }).json()

    return {
        certificates,
        certificatesById,
        certificatesDelete,
        createCertificates,
        updateCertificates,
    }
}
